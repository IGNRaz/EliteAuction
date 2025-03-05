<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Category;
use App\Models\Video;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AuctionController extends Controller
{
    //
    public function myAuctions()
    {
        $auctions = Auction::paginate(10)->where("user_id", "=", Auth::user()->id);

        return view("myAuctions.myAuctions", compact("auctions"));
    }

    public function viewAuctionDetails($id)
    {
        $auction = Auction::findOrFail($id);
        // dd($auction->videos[0]);
        return view('myAuctions.viewDetails', compact('auction'));
    }

    public function edit($id)
    {
        $auction = Auction::findOrFail($id);
        return view('myAuctions.editMyAuctions', compact('auction'));
    }
    public function update(Request $request, $id)
    {
        $auction = Auction::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1',
            'entery_fee' => 'required|numeric|min:1',
            'minumum_bid' => 'required|numeric|min:1',
            'end_date' => 'required|date|after:now',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($auction->image && Storage::disk('public')->exists($auction->image)) {
                Storage::disk('public')->delete($auction->image);
            }
            // Store new image
            $data['image'] = $request->file('image')->store('auction-images', 'public');
        }


        $auction->update($data);
        Image::create([
            'image_path' => $data['image'],
            'auction_id' => $auction->id,
        ]);

        return redirect()->route('myAcutions')->with('success', 'Auction updated successfully');
    }


    public function create()
    {
        $categories = Category::all(); // جلب جميع الفئات
        return view('auctions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // التحقق من البيانات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'end_date' => 'required|date',
            'minumum_bid' => 'required|numeric',
            'catagory_id' => 'required|exists:catagorys,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        // إنشاء المزاد
        $auction = Auction::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'end_date' => $request->end_date,
            'entery_fee' => 50,
            'minumum_bid' => $request->minumum_bid,
            'catagory_id' => $request->catagory_id,
        ]);

        // حفظ الصور
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $auction->images()->create(['image_path' => $path]);
            }
        }

        

        return redirect()->route('myAcutions')->with('success', 'تم إضافة المزاد بنجاح.');
    }

    //عرض المزادات جميع المزادات حسب الفئة
    public function index()
    {
        $categories = Category::all(); // جلب جميع الفئات
        $auctions = Auction::paginate(10);

        return view('auctions.index', compact('auctions', 'categories'));
    }
    //عرض مزادات حسب الفئة
    public function filterByCategory(Request $request)
    {
        $categoryId = $request->query('catagory_id');

        if (!$categoryId) {
            return redirect()->route('auctions.index')->with('error', 'Please select a category.');
        }

        $categories = Category::all();
        $auctions = Auction::where('catagory_id', $categoryId)->get();

        return view('auctions.index', compact('auctions', 'categories'));
    }



    public function bid(Request $request, Auction $auction)
    {
        
        $request->validate([
            'bid_amount' => 'required|integer|min:' . ($auction->bids->sum('bid_amount') + $auction->minumum_bid),
        ]);
        

        $user = Auth::user();
        $wallet = $user->wallet;

        if ($wallet->balance < $request->bid_amount) {
            return back()->with('error', 'رصيد غير كافٍ');
        }

        $previousBid = Bid::where('auction_id', $auction->id)
            ->orderBy('bid_amount', 'desc')
            ->first();

        // التأكد مما إذا كان المزايد السابق هو نفسه المستخدم الحالي
        if ($previousBid && $previousBid->user_id !== $user->id) {
            $previousWallet = $previousBid->user->wallet;

            $previousWallet->update([
                'total_holded' => $previousWallet->total_holded - $previousBid->bid_amount,
                'balance' => $previousWallet->balance + $previousBid->bid_amount,
            ]);
        } else if ($previousBid && $previousBid->user_id === $user->id) {
            // في حالة كان نفس المستخدم، يتم فقط تعديل المحفظة بدلاً من استرداد وإعادة الخصم
            $wallet->update([
                'total_holded' => $wallet->total_holded - $previousBid->bid_amount,
                'balance' => $wallet->balance + $previousBid->bid_amount,
            ]);
        }

        // تسجيل المزايدة الجديدة
        Bid::create([
            'user_id' => $user->id,
            'auction_id' => $auction->id,
            'bid_amount' => $request->bid_amount,
            'bid_at' => now(),
        ]);

        // تحديث سعر المزاد
        $auction->update([
            'price' => $request->bid_amount,
        ]);

        // خصم المبلغ الجديد من المحفظة
        $wallet->update([
            'total_holded' => $wallet->total_holded + $request->bid_amount,
            'balance' => $wallet->balance - $request->bid_amount,
        ]);

        return back()->with('success', 'تمت المزايدة بنجاح!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Video;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class AuctionController extends Controller
{
    //
    public function myAuctions() {
        $auctions = Auction::paginate(10)->where("user_id", "=", auth()->user()->id);

        return view("myAuctions.myAuctions", compact("auctions"));
    }

    public function viewAuctionDetails($id) {
        $auction = Auction::findOrFail($id);
        // dd($auction->videos[0]);
        return view('myAuctions.viewDetails', compact('auction'));
    }

    public function edit($id) {
        $auction = Auction::findOrFail($id);
        return view('myAuctions.editMyAuctions', compact('auction'));
    }
    public function update(Request $request, $id) {
        $auction = Auction::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1',
            'entery_fee' => 'required|numeric|min:1',
            'minumum_bid' => 'required|numeric|min:1',
            'end_date' => 'required|date|after:now',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
}

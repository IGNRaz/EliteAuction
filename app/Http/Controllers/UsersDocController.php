<?php

namespace App\Http\Controllers;

use App\Models\UsersDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersDocController extends Controller
{
    //
    public function add()
    {
        if (!UsersDoc::where("user_id", Auth::user()->id)->exists()) {
            return view("profile.partials.AccountVerification");
        } elseif (UsersDoc::where("user_id", Auth::user()->id)
            ->where("is_verified", 1)
            ->exists()
        ) {
            $wallet = Auth::user()->wallet;
            
            return view('wallet.show', compact('wallet'));
        }

        return view('wallet.waiting');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // ✅ التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            "Document" => "required|mimes:pdf,docx,doc,jpeg,jpg|max:2048",
            "DocumentType" => "required",
        ]);
        // dd($validatedData);

        

        // ✅ رفع الملف وحفظه في مجلد `public/storage/user_docs`
        if ($request->hasFile('Document')) {
            $file = $request->file('Document');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('user_docs', $fileName, 'public'); // تخزين الملف في storage/app/public/user_docs
        } else {
            return response()->json(['error' => 'لم يتم رفع الملف'], 400);
        }

        // ✅ حفظ البيانات في قاعدة البيانات
        $save_userdoc = UsersDoc::create([
            "doc_type" => $request->DocumentType,
            "doc_path" => $filePath, // حفظ المسار النسبي للملف
            "user_id" => Auth::user()->id,
        ]);

        // ✅ التأكد من نجاح الإدراج
        if ($save_userdoc) {
            return view('wallet.waiting');
        } else {
            return response()->json(['error' => 'فشل في حفظ المستند'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{

    public function show()
{
    $wallet = Auth::user()->wallet;
    return view('wallet.show', compact('wallet'));
}


public function deposit(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:0',
    ]);

    $wallet = Auth::user()->wallet;
    $wallet->balance += $request->amount;
    $wallet->total_deposited += $request->amount;
    $wallet->save();

    return redirect()->route('wallet.show')->with('success', 'تم إضافة الرصيد بنجاح.');
}


public function withdraw(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:0',
    ]);

    $wallet = Auth::user()->wallet;

    if ($wallet->balance < $request->amount) {
        return redirect()->route('wallet.show')->with('error', 'الرصيد غير كافي.');
    }

    $wallet->balance -= $request->amount;
    $wallet->total_withdrawn += $request->amount;
    $wallet->save();

    return redirect()->route('wallet.show')->with('success', 'تم سحب الرصيد بنجاح.');
}

}

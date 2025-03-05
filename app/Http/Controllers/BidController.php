<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bid;
use App\Models\User;
use Illuminate\Http\Request;

class BidController extends Controller
{
    //
    public function endAuction(Auction $auction,User $user){
        $bid = Bid::where("auction_id",$auction->id);
        if($bid){
        //     $bid->user->update([
        //         "wallet" => $bid->user->wallet + $bid->amount,
        //     ]);
        // }else{
        //     $auction->user->update([
        //         "wallet" => $auction->user->wallet + $auction->start_price,
        //     ]);
        // }
        $bid->update([
            "is_winning" => 1,
            "winning_at" => now()
        ]);

        $auction->update([
            "is_sold" => 1,
            "is_active" => 0,
            "sold_to" => $user->id,
            "sold_at" => now(),
        ]);
        return back()->with("success","تم البيع");
    }
}
}
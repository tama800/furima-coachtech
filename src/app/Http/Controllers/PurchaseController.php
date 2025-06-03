<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use App\Models\Address;

class PurchaseController extends Controller
{
    public function purchase(Item $item)
{
    $user = auth()->user();
    $profile = $user->profile;

    return view('items.purchase', compact('item','profile'));
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;

class AddressController extends Controller
{
    public function edit(Item $item)
    {
        $profile = Profile::where('user_id', auth()->id())->first();

        return view('address_edit', compact('item', 'profile'));
    }
}

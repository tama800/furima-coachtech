<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Profile;


class ProfileController extends Controller
{
    public function editProfile()
    {
        return view('profile_edit');
    }

    public function updateProfile(Request $request)
    {
        Profile::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'name' => $request->name,
                'postal_code' => $request->postal_code,
                'address' => $request->address,
                'building' => $request->building,
            ]
        );

        return redirect('/');
    }
}

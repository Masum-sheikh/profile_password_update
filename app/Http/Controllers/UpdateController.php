<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());




      $input=$request->all();
        // Handle image upload
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // Update the user
        $user->update($input);

        return back()->with('success', 'Profile updated successfully.');
    }
    public function password_show(){
        return view('password_show');
    }
    public function password_update(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user(); // Get the currently authenticated user

    // Check if the current password matches
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    // Update the user's password and save
    $user->update(['password' => Hash::make($request->new_password)]);

    return redirect()->route('home')->with('success' , 'password update successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        return view('change-password.edit');
    }

    public function update(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $oldPassword = $request->old_password;
        $hashedPassword = $user->password;

        if(! Hash::check($oldPassword, $hashedPassword)) {
            throw ValidationException::withMessages([
                'old_password' => 'The old password is incorrect.'
            ]);
        }

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);

        return to_route('profile.show')->with('success', 'Password was changed successfully!');
    }
}

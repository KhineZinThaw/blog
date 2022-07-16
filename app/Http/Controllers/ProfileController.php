<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function create()
    {
        return view('users.profile');
    }

    public function update(ProfileRequest $request)
    {
        if(auth()->user()->image) {
            auth()->user()->image->delete();
        }

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $dir = '/upload/images';
        $path = $file->storeAs($dir, $filename);

        auth()->user()->image()->create([
            'path' => $path,
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', 'A Profile was updated successfully.');
    }
}

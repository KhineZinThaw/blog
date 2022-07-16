<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function create()
    {
        return view('users.profile');
    }

    public function update(ProfileRequest $request)
    {
        $user = auth()->user();

        if($request->hasFile('image')) {
            if($user->image) {
                Storage::delete($user->image->path);
                $user->image->delete();
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $dir = '/upload/images';
            $path = $file->storeAs($dir, $filename);
    
            $user->image()->create([
                'path' => $path,
            ]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', 'A Profile was updated successfully.');
    }
}

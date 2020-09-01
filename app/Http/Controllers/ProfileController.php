<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('profile.show');
    }

    public function avatar()
    {
        $user = auth()->user();

        $path = 'storage/avatars/'. now() . '_' . $user->name .'.jpg';

        if($user->avatar){
            $avatar_path = public_path($user->avatar);

            if(file_exists($avatar_path)){
                File::delete($avatar_path);
            }
        }

        Image::make(request()->file('avatar'))->resize(200, 200)->save($path);

        $user->update([
            'avatar'=> '/' . $path
        ]);

        return back();
    }
}

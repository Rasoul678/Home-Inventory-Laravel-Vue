<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use JD\Cloudder\Facades\Cloudder;

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

        if(config('app.env') === 'local'){

            $path = 'storage/avatars/'. now() . '_' . $user->name .'.jpg';

            if($user->avatar_url){
                $avatar_path = public_path($user->avatar_url);

                if(file_exists($avatar_path)){
                    File::delete($avatar_path);
                }
            }

            Image::make(request()->file('avatar'))->resize(200, 200)->save($path);

            $user->update([
                'avatar_url'=> '/' . $path
            ]);

        }else
        {
            if ($image = request()->file('avatar')) {
//                if(isset($user->avatar_url)){
//                    $user->update([
//                        'avatar_url'=> '',
//                        'avatar_public_id'=> ''
//                    ]);
//                }
                $image_path = $image->getRealPath();
                Cloudder::upload($image_path,  now() . $user->name, [
                    "folder" => "inventory-laravel/avatars/",
                    ]);
                $publicId = Cloudder::getPublicId();
                $avatarUrl = Cloudder::secureShow($publicId, [
                    'width'     => 200,
                    'height'    => 200
                ]);
                $user->update([
                    'avatar_url'=> $avatarUrl,
                    'avatar_public_id'=> $publicId
                ]);
            }
        }

        return back();
    }
}

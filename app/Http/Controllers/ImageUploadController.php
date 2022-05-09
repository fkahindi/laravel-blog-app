<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class ImageUploadController extends BaseController
{
    /**
     * display listing of the resource
     * @return Illuminate\Http\Response
     */
    public function addImage()
    {
        return view('site/posts/addImage');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:250000',
        ]);

        $user = User::find(auth()->user()->id);

        if($request->file('image'))
        {
            $file = $request->file('image');
            $username_arr = explode(' ', $user->name);
            $username = implode($username_arr);

            $filename = strtolower($username . '-0'. $user->id . '.'. $file->getClientOriginalExtension());
            $file->move(public_path('images/users'),$filename);
            $user['image'] = $filename;

        }
        $user->save();

        $url = $request->input('url');

        return redirect($url)
            ->with('success','Image uploaded successfully.');
    }   
}

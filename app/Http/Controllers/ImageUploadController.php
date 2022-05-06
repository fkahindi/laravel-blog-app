<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;

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
            $filename = date('dmYHi').$file->getClientOriginalName();
            $file->move(public_path('images'),$filename);
            $user['image'] = $filename;
        }
        $user->save();

        return back()
            ->with('success','Image uploaded successfully.');
    }
    /**
     * display listing of the resource
     * @return Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        /* $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,giv,svg',
        ]);

        $imgaName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imgaName);
 */
        /* store $imgaName name in database */
        /* $this->setPageTitle('Image','Upload image');

        $request->User::update([
            'image'=>'image-path',
        ]);
        return back()
            ->with('success','Image upload was successful.')
            ->with('image', $imgaName); */
    }
}

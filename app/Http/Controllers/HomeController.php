<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseController;
use App\Models\Post;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $this->setPageTitle('Posts', 'List of posts');

        return view('site.posts.index',[
            'posts' => Post::paginate(10)
        ]);
    }

    public function show(Post $post)
    {
       $comments = Post::find($post->id)->comments;
        $this->setPageTitle('This post','');
        return view('site.posts.show',['post'=>$post, 'comments'=>$comments]);
    }
}

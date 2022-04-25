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
        $posts = Post::all();

        $this->setPageTitle('Posts', 'List of posts');

        return view('site.posts.index',['posts'=>$posts]);
    }

    public function show()
    {
        $post = Post::find(1);
        $this->setPageTitle('This post','');
        return view('site.posts.show',['post'=>$post]);
    }
}

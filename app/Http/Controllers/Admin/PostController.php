<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Contracts\PostContract;
//use App\Contracts\TopicContract;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class PostController extends BaseController
{
    protected $postRepository;

    public function __construct(
        PostContract $postRepository
    )
    {
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->listPosts();

        $this->setPageTitle('Posts', 'List of all posts');
        return view('/admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::orderBy('name')->get();
        //$topics = $this->topicRepository->listTopics('name', 'asc');

        $this->setPageTitle('Posts','Create Post');

        return view('/admin.posts.create', ['topics'=>$topics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'topic_id' => 'required|not_in:0',
            'user_id' => 'required|not_in:0',
            'title' => 'required'
        ]);

        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['title']);

        $this->postRepository->createPost($params);

        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postRepository->findPostById($id);
        
        return view('/admin.posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->findPostById($id)/* ->topic */;
        $topics = Topic::orderBy('name')->get();
        //$topics = $this->topicRepository->listTopics('name', 'asc');

        $this->setPageTitle('Posts', 'Edit Post');
        return view('/admin.posts.edit', ['topics'=>$topics, 'post'=>$post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'topic_id' => 'required',
            'user_id' => 'required',
            'title' => 'required'
        ]);

        $params = $request->except('_token');

        $this->postRepository->updatePost($params);

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = $this->postRepository->deletePost($id);

        return redirect('/admin/posts');
    }
}

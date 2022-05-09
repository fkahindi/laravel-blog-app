<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Post;
use App\Models\Topic;
use App\Contracts\PostContract;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Posts', 'List of all posts');
        return view('/admin.posts.index',['posts'=>Post::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $topics = DB::table('topics')->orderBy('name')->get();

        $this->setPageTitle('Create Post','');

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
            'title' => 'required',
            'body' => 'required',
        ]);

        $params = $request->except('_token');

        $params['slug'] = Str::slug($params['title']);

        if($request->file('image'))
        {
            $request->validate([
                'image' => 'image|mimes:jpeg,jpg,png,gif,svg,webp|max:250000',
            ]);

            $file = $request->file('image');
            $filename = $params['slug'].'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/posts'),$filename);

            $params['image'] = $filename;
        }

        $post = new Post($params);

        $post->save();

        $url = $request->input('url');
        return redirect($url)
            ->with('success', 'Post save successful.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post )
    {

        return view('/admin.posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $topics = DB::table('topics')->orderBy('name')->get();

        $edit_topic = Topic::where('id', $post->topic_id)->value('name');

        $this->setPageTitle('Edit Post', '');

        return view('/admin.posts.edit', ['topics'=>$topics, 'edit_topic' => $edit_topic, 'post'=>$post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'topic_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);


        if($request->file('image'))
        {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif,svg,webp|max:250000',
            ]);

            $file = $request->file('image');
            $filename = $post->slug.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/posts'),$filename);
            $post['image'] = $filename;
        }

        $post->update([
            'topic_id' => $request->topic_id,
            'user_id' => $request->user_id,
            'title' => $request->title,
            'body' => $request->body,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'image' => $post['image'],
            'image_caption' => $request->image_caption,
        ]);

        $url = $request->input('url');

        return redirect($url)
            ->with('success', 'Post update successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete(Post $post)
    {
        $post->delete();

        return redirect('/admin/posts');
    }
}

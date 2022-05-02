<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created comments in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate($request,[
            'post_id'=> 'required|not_in:0',
            'body'=> 'required'
        ]);

        $input['user_id'] = auth()->user()->id;
        //$params = $request->except('_token');

        $comment = new Comment($input);

        $comment->save();
        //$comment_id = $comment->id;

        return back();
    }

    /**
     * Store a newly created comments in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function replyStore(Request $request)
    {
        $this->validate($request,[
            'post_id' => 'required|not_in:0',
            'comment_id' => 'required|not_in:0',
            'reply_body' => 'required'
        ]);

        $reply = new Comment;

        $reply->body = $request->get('reply_body');
        $reply->parent_id = $request->get('comment_id');
        $reply->post_id = $request->get('post_id');
        $reply['user_id'] = auth()->user()->id;

        $reply->save();

        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

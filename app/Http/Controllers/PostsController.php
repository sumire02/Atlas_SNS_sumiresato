<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        //
    }

    // 作成した投稿を保存
    public function store(Request $request)
    {
        //
        $post = new Post;
        $post->post = $request->post;
        $post->user_id = Auth::id();
        $post->save();
        return redirect('top');
    }

    public function delete($id)
    {
        \DB::table('posts')
        ->where('id', $id)
        ->delete();

        return redirect('top');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $id = $request->id;
        //
        $id = $request->input('id');
        $up_post = $request->input('posts');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('/top');


    }

    public function destroy($id)
    {
        //
    }

}

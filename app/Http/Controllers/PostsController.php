<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(2);
        return view('posts/index', compact('posts'));

    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'title'=>'required|min:3|max:255',
            'body'=>'required|min:3',
            'image'=>''
        ]);

        $data['user_id'] = Auth::id();
        $data['user_name'] = Auth::user()->name;

        if(Post::create($data)){
            return redirect(route('posts.index'))->with('success', 'Post created Successfully.');
        }
        return redirect(route('posts.index'))->with('failed', 'Failed creating the post');

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if($post->user_id == Auth::id()){
            return view('posts.edit', compact('post'));
        }
        return redirect(route('posts.index'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'=>'required|min:3|max:255',
            'body'=>'required|min:3',
            'image'=>''
        ]);

        if($post->update($data)){
            return redirect(route('posts.index'))->with('success', 'Post updated Successfully.');
        }
        return redirect(route('posts.index'))->with('failed', 'Failed updating the post');
    }

    public function destroy(Post $post)
    {
        if($post->user_id == Auth::id()){
            if($post->delete()){
                return redirect(route('posts.index'))->with('success', 'Post deleted successfully.');
            }
            return redirect(route('posts.index'))->with('failed', 'Post deleted successfully.');
        }
        return redirect(route('posts.index'));


    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
	public function __construct()
	{
		// $this->middleware('auth');
	}

    public function index()
    {
        // $users = auth()->user()->following()->pluck('profiles.user_id');
        // $users[] = auth()->user()->id;
        // // dd($users);
        // $posts = Post::whereIn('user_id', $users)->latest()->get();
        $posts = Post::all()->load('user.profile');
        // dd($posts);
        return view('home', compact('posts'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	$data = request()->validate([
    		'title' => 'required',
            'description' => 'required',
    		'image' => ['required', 'image']
    	]);

    	$imagePath = request('image')->store('uploads','public');

    	$resp = auth()->user()->posts()->create([
    		'title' => $data['title'],
            'description' => $data['description'],
    		'image' => $imagePath
        ]);
        
        return response($resp);
    }

    public function show(\App\Post $post)
    {
    	return view('posts.show', compact('post'));
    	// dd($post);
    }

    public function edit(\App\Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(\App\Post $post)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $imagePath = ($data['image'] == $post->image) ? $data['image']:request('image')->store('uploads', 'public');

        $resp = $post->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath
        ]);

        if ($resp) {
            return response(['updated' => true]);
        }
    }

    public function destroy(\App\Post $post)
    {
        $resp = $post->delete();

        if ($resp) {
            return response(['deleted' => true]);
        }
    }
}

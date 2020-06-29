<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /*public function index($user)
    {
    	$user = User::findOrFail($user);

        return view('profiles.index',[
        	'user' => $user
        ]);
    }*/

    public function index(User $user)
    {
		$posts = $user->posts;
    	return view('profiles.index', compact('user','posts'));
    }

    public function edit(User $user)
    {
    	$this->authorize('update', $user->profile);

    	return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
    	$data = request()->validate([
    		'title' => 'required',
    		'dscp' => 'required',
    		'url' => 'url',
    		'image' => ''
    	]);

    	// dd($data);

    	if (request('image')) {
    		$imagePath = request('image')->store('uploads','public');
	    	$data['image'] = $imagePath;
    	}

    	auth()->user()->profile->update($data);
    	return redirect("/profile/{$user->id}");
    }
}

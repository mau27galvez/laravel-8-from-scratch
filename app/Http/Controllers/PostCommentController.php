<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $attributes = $this->validate($request, [
            'body' => 'required',
        ]);

        $attributes['user_id'] = $request->user()->id;

        $post->comments()->create($attributes);

        return back();
    }
}

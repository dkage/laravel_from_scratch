<?php


namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\DB;


class PostsController
{
    public function show ($slug) {
        $post = Post::where('slug', $slug) -> firstOrFail();

        return view('post', [
            'post_value' => $post
        ]);
    }
}

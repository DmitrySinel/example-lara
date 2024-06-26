<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        $posts = auth()->user()->LikedPosts;
        return view('personal.liked.index', compact('posts'));
    }
}

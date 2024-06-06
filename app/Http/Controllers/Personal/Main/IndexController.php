<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        $likes = auth()->user()->LikedPosts->count();
        $comments = auth()->user()->comments->count();
        return view('personal.main.index', compact('likes', 'comments'));
    }
}

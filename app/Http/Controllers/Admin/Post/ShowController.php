<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function index(Post $post) {
        return view('admin.post.show', compact('post'));
    }
}

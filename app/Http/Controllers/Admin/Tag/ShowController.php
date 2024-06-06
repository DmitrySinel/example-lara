<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index(Tag $tag) {
        return view('admin.tag.show', compact('tag'));
    }
}

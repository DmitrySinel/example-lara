<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function index(Tag $tag) {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}

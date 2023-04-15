<?php

namespace App\Http\Controllers;



use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug)
    {

        $tags=Tag::where('slug', $slug)->firstorFail();
        $posts = $tags->posts()->with('category')->orderBy('id','desc')->paginate(2);
        return view('tags.show', compact('tags', 'posts'));

    }
}

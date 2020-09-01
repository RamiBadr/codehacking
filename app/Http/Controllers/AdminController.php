<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        $postCount = Post::count();
        $categoryCount = Category::count();
        $commentCount = Comment::count();
        $photoCount = Photo::count();

        return view('admin.index', compact('postCount', 'categoryCount', 'commentCount', 'photoCount'));
    }
}

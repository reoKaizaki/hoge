<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
     public function index(Post $post)
    {
        //$postテーブルの全データを"posts"という変数に入れて、postsフォルダにある"index.blade.php"（View）に渡す
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
}
?>
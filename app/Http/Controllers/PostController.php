<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
     public function index(Post $post)
    {
        //$postテーブルの全データを"posts"という変数に入れて、postsフォルダにある"index.blade.php"（View）に渡す
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    /**
     * 特定IDのpostを表示する
    *
    * @params Object Post // 引数の$postはid=1のPostインスタンス
    * @return Reposnse post view
    */
    public function show(Post $post)
    {
        //'post'はbladeファイルで使う変数。中身は任意のidにおけるPostデータをインスタンス化した$post。
        return view('posts.show')->with(['post' => $post]);
    }
    
    /*
    public function create()
    {
        return view('posts.create');
    }
    */
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
?>
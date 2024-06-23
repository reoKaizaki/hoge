<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//8-1
/*Route::get('/', function() {
    return view('posts.index');
});*/

//8-2
//"/"を受けとると、PostControllerというクラス内のindexメソッドを返す
Route::get('/', [PostController::class, 'index']);

//8-4
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

//8-3
// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
Route::get('/posts/{post}', [PostController::class ,'show']);

//8-5
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);

//8-6
Route::delete('/posts/{post}', [PostController::class,'delete']);
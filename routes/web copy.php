<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('postlist');


//Route::get('/post/{id}', function (Request $request, $id) {
//    //recupérer les informations id obligatoire
//    dd($request);   
//});


//Route::get('/posts/{id?}', function ($id) {
//    //id? optional
//    dd($id);
//});

Route::get('/posts', [PostController::class, 'index'])->name('postlist');

Route::get('/posts/{id?}', [PostController::class, 'postsById'])->name('postsDetails');

Route::get('/addpost', [PostController::class, 'create']);
Route::post('/addpost', [PostController::class, 'store'])->name('ajoutpost');

Route::get('/update/posts/{id?}', [PostController::class, 'udpdateview']);
Route::put('/update/posts/{id?}', [PostController::class, 'udpdate'])->name('update');
Route::put('/update/posts/{id}/picture', [PostController::class, 'updatepicture'])->name('postupdatepicture');
Route::delete('/posts/{id?}', [PostController::class, 'removePost'])->name('removePost');

Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('commentAdd');

Route::delete('/comments/{id}/', [CommentController::class, 'delete'])->name('deleteComment');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/sendmail', [ContactController::class, 'send'])->name('contactSend');



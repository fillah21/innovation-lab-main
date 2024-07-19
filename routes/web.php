<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('/admin/')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/', function(){return view('pages.admin.dashboard');})->name('dashboard');


    Route::resource("category", CategoryController::class);
    Route::get('category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('category/{category}/status', [CategoryController::class, 'status']) ->name('category.status'); 

    Route::resource("thread", ThreadController::class);
    Route::get('thread/{thread}/delete', [ThreadController::class, 'destroy'])->name('thread.delete');
    Route::get('thread/{thread}/status', [ThreadController::class, 'status']) ->name('thread.status');

    Route::resource("user", UserController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('user/{user}/status', [UserController::class, 'status']) ->name('user.status'); 

    Route::resource("comment", CommentController::class);
    Route::get('comment/{comment}/delete', [CommentController::class, 'destroy'])->name('comment.delete');
    Route::get('comment/{comment}/status', [CommentController::class, 'status']) ->name('comment.status');

    Route::get('dashboard/total-user', [UserController::class, 'totalUser'])->name('dashboard.totalUser');

});

Route::get('/', function(){return view('pages.home');})->name('home');

Route::get("/forum", [ForumController::class, 'show'])->name('forum');

Route::middleware('auth')->group(function(){
    Route::get("profil", [ProfilController::class, 'index'])->name('profil');
    Route::put("profil", [ProfilController::class, 'store'])->name('profilStore');

    
    Route::post("buat-thread", [ForumController::class, 'store'])->name(('buat-thread'));
    
    Route::get('forum/thread/{thread}', [ForumController::class, 'showThreadDetail'])->name('thread.detail');
    Route::get('forum/thread/{thread}/like', [ForumController::class, 'like'])->name('thread.like');
    Route::get('forum/thread/{thread}/dislike', [ForumController::class, 'dislike'])->name('thread.dislike');
    Route::get('forum/thread/{thread}/delete', [ForumController::class, 'destroyThread'])->name('threadDelete');
    Route::get('forum/comment/{comment}/delete', [ForumController::class, 'destroyComment'])->name('commentDelete');
    Route::get('forum/comment/', [ForumController::class, 'storeComment'])->name('commentStore');
    
    Route::put('forum/thread/{thread}/edit', [ForumController::class, 'editThread'])->name('thread.edit');
    Route::put('forum/comment/{comment}/edit', [ForumController::class, 'editComment'])->name('comment.edit');
});


Route::get("login", [AuthController::class, 'login'])->name('login');
Route::post("login", [AuthController::class, 'loginStore'])->name('loginStore');
Route::get("logout", [AuthController::class, 'logout'])->name('logout');
Route::get("register", [AuthController::class, 'register'])->name('register');
Route::post("register", [AuthController::class, 'registerStore'])->name('registerStore');



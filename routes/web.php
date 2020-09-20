<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\ProfileController;

use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\PostController as AdminPost;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\CommentController as AdminComment;
use App\Http\Controllers\Admin\MediaController as AdminMedia;
use App\Http\Controllers\Admin\SettingController as AdminSetting;
use App\Http\Controllers\Admin\UserController as AdminUser;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{slug}', [HomeController::class, 'post'])->name('post');
Route::post('/comment', [Homecontroller::class, 'comment'])->name('comment');

Route::prefix('/category')->name('category.')->group(function ()
{
	Route::get('/', [Homecontroller::class, 'category'])->name('home');
	Route::get('/{slug}', [Homecontroller::class, 'showCategory'])->name('show');
});

Route::prefix('/user')->middleware('auth')->name('user.')->group(function ()
{

	Route::view('/dashboard', 'user.home')->name('home');
	Route::redirect('/', '/user/dashboard');

	Route::resource('/post', PostController::class, ['except' => 'show']);
	Route::resource('/category', CategoryController::class, ['except' => 'show']);
	Route::resource('/comment', CommentController::class, ['only' => ['index', 'destroy']]);
	Route::resource('/media', MediaController::class, ['except' => ['show', 'edit', 'update']]);
	Route::post('/media/save', [MediaController::class, 'save'])->name('media.save');

	Route::prefix('profile')->name('profile.')->group(function ()
	{
		Route::get('/', [ProfileController::class, 'index'])->name('index');
		Route::put('/update', [ProfileController::class, 'update'])->name('update');
	});
	
});

Route::prefix('/admin')->name('admin.')->group(function ()
{
	
	Route::middleware('auth:admin')->group(function ()
	{
		Route::view('/dashboard', 'admin.home')->name('home');
		Route::redirect('/', '/admin/dashboard');
		
		Route::resource('/post', AdminPost::class, ['only' => ['index', 'destroy']]);
		Route::resource('/category', AdminCategory::class, ['only' => ['index', 'destroy']]);
		Route::resource('/comment', AdminComment::class, ['only' => ['index', 'destroy']]);
		Route::resource('/media', AdminMedia::class, ['only' => ['index', 'destroy']]);
		Route::resource('/user', AdminUser::class, ['only' => ['index', 'show', 'destroy']]);

		Route::prefix('/setting')->name('setting.')->group(function ()
		{
			Route::get('/', [AdminSetting::class, 'index'])->name('index');
			Route::put('/update', [AdminSetting::class, 'update'])->name('update');
		});
	});

	Route::get('/login', [LoginController::class, 'showLoginForm']);
	Route::post('/login', [LoginController::class, 'login'])->name('login');
	Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});
<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TopicController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth']], function()
{
    Route::controller(PostController::class)->group(function(){
    Route::get('/site/posts', 'index');
    Route::get('/admin/posts','index');
    Route::get('/admin/post/{post}', 'show');
    Route::get('/admin/post/create/post', 'create');
    Route::post('/admin/post/create/post', 'store');
    Route::get('/admin/post/{post}/edit', 'edit');
    Route::put('/admin/post/{post}/edit', 'update');
    Route::delete('/admin/post/{post}', 'delete');
    });

    Route::controller(TopicController::class)->group(function(){
        Route::get('/admin/topics', 'index');
        Route::get('/admin/topic/{topic}', 'show');
        Route::get('/admin/topic/create/topic', 'create');
        Route::post('/admin/topic/create/topic', 'store');
        Route::get('/admin/topic/{topic}/edit','edit');
        Route::put('/admin/topic/{topic}/edit', 'update');
        Route::put('/admin/topic/{topic}', 'destroy');
    });
});


Auth::routes(['verify' => true]);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin/dashboard')->middleware('verified');

/* Route::get('/admin/topics',[\App\Http\Controllers\Admin\TopicController::class, 'index']);
Route::get('/admin/topic/{topic}',[\App\Http\Controllers\Admin\TopicController::class, 'show']);
Route::get('/admin/topic/create/topic',[\App\Http\Controllers\Admin\TopicController::class, 'create']);
Route::post('/admin/topic/create/topic',[\App\Http\Controllers\Admin\TopicController::class, 'store']);
Route::get('/admin/topic/{topic}/edit',[\App\Http\Controllers\Admin\TopicController::class, 'edit']);
Route::put('/admin/topic/{topic}/edit',[\App\Http\Controllers\Admin\TopicController::class, 'update']);
Route::delete('/admin/topic/{topic}',[\App\Http\Controllers\Admin\TopicController::class, 'destroy']);
 */
/* Route::get('/site/posts', [\App\Http\Controllers\Admin\PostController::class, 'index']);

Route::get('/admin/posts', [\App\Http\Controllers\Admin\PostController::class, 'index']);
Route::get('/admin/post/{post}', [\App\Http\Controllers\Admin\PostController::class, 'show']);
Route::get('/admin/post/create/post', [\App\Http\Controllers\Admin\PostController::class, 'create']);
Route::post('/admin/post/create/post', [\App\Http\Controllers\Admin\PostController::class, 'store']);
Route::get('/admin/post/{post}/edit', [\App\Http\Controllers\Admin\PostController::class, 'edit']);
Route::put('/admin/post/{post}/edit', [\App\Http\Controllers\Admin\PostController::class,'update']);
Route::delete('/admin/post/{post}', [\App\Http\Controllers\Admin\PostController::class,'delete']);
 */

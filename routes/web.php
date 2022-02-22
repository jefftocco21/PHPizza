<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/posts', function() {
//     return view('posts');
// });

Route::get('posts/{post}', function ($slug) {

    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if(!file_exists($path)){
        abort(404);
    }

    $post = file_get_contents($path);

    return view('post', [
        'post' => $post
    ]);
})->where('posts', '[A-z_\-]+');

require __DIR__.'/auth.php';

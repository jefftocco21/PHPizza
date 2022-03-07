<?php

use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Post;
use App\Models\Topping;
use App\Models\User;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function(){
     return view('posts',[
        'posts' => Post::latest()->with('topping', 'author')->get()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
 });

 Route::get('toppings/{topping:slug}', function (Topping $topping){
     return view('posts', [
         'posts' => $topping->posts
     ]);
 });

 Route::get('authors/{author:username}', function (User $author){
    return view('posts', [
        'posts' => $author->posts
    ]);
});


require __DIR__.'/auth.php';

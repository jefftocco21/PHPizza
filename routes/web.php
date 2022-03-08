<?php

use App\Http\Controllers\PostController;
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

//Route to controller provide full path then action/method to be triggered
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

 Route::get('toppings/{topping:slug}', function (Topping $topping){
     return view('posts', [
         'posts' => $topping->posts->load(['topping', 'author']),
         'currentTopping' => $topping,
         'toppings' => Topping::all()
     ]);
 })->name('topping');

 Route::get('authors/{author:username}', function (User $author){
    return view('posts', [
        'posts' => $author->posts->load(['topping', 'author']),
        'toppings' => Topping::all()
    ]);
});


require __DIR__.'/auth.php';

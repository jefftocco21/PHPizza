<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Topping;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::latest();

        if(request('search')){
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

         return view('posts.index',[
            'posts' => Post::latest()->filter(request(['search', 'topping', 'author']))->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}

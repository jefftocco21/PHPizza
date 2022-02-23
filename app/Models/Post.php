<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $desc;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $desc, $date, $body, $slug)
    {
        $this->title = $title;
        $this->desc = $desc;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all(){
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts/")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) =>
                new Post(
                    $document->title,
                    $document->desc,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
                ->sortByDesc('date');
        });

    }

    public static function find($slug){
        //of all blog posts find the one with slug that matches
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug){
        //fail if a post was not found
        $post = static::find($slug);

        if(! $post){
            abort(404);
        }

        return $post;
    }

}

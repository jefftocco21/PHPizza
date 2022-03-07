<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function topping()
    {
        return $this->belongsTo(Topping::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

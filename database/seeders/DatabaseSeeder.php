<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Topping;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Topping::truncate();
        Post::truncate();

        $user = User::factory()->create([
            'name' => 'Jeff Tocco'
        ]);

        Post::factory(5)->create([
            'user_id' => $user
        ]);

        // $user = User::factory()->create();

        // $buffalo = Topping::create([
        //     'name' => 'Buffalo Chicken',
        //     'slug' => 'buffalo-chicken'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'topping_id' => $buffalo->id,
        //     'title' => "Lindo's Pizza",
        //     'slug' => "Lindo's-pizza",
        //     'excerpt' => '<p>An okay experience.</p>',
        //     'body' => "<p>Lindo's Buffalo Chicken left a to be desired.</p>",
        // ]);
    }
}

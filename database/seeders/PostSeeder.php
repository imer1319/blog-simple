<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(300)->create()->each(function (Post $post){
            $post->tags()->attach([
                rand(1,5),
                rand(6,14),
                rand(15,20)
            ]);
        });
    }
}

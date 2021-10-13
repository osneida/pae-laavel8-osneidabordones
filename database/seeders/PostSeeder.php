<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Image;

class PostSeeder extends Seeder
{
    
    public function run()
    {
       $posts = Post::factory(100)->create();

        foreach( $posts as $post ){

            $post->tags()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);
        }


    }
}

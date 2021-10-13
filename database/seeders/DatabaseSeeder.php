<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        \App\Models\User::factory(20)->create();
        $this->call(RoleSeeder::class);
        
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
  
	   

    }
}

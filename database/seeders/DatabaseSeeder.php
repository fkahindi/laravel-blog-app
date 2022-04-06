<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(TopicsTableSeeder::class);
        \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        \App\Models\Topic::factory(3)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Comment::factory(10)->create();
        \App\Models\Reply::factory(10)->create();

        //$this->call(PostsTableSeeder::class);
    }
}

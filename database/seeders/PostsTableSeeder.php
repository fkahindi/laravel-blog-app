<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Post;
use App\Models\User;
use App\Models\Topic;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Post::create([
            'topic_id' => Topic::factory(),
            'user_id' => User::factory(), //Generates a User from factory and extracts id
            'title' => $this->faker->sentence, //Generates a fake sentence
            'slug' => $this->faker->slug(),
            'body' => $this->faker->paragraph(15), //generates fake 30 paragraphs
            'description' =>$this->faker->sentence,
            'keywords' =>$this->faker->sentence
        ]);
    }
}

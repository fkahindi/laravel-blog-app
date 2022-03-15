<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Topic;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostModel>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'topic_id' => Topic::factory(),
            'user_id' => User::factory(), //Generates a User from factory and extracts id
            'title' => $this->faker->sentence, //Generates a fake sentence
            'slug' => $this->faker->slug(),
            'body' => $this->faker->paragraph(15), //generates fake 30 paragraphs
            'meta_description' =>$this->faker->sentence,
            'meta_keywords' =>$this->faker->sentence
        ];
    }
}

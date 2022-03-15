<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Topic::create([
            'name' => 'HTML',
            'description' => $faker->paragraph(30),
            'keywords' => $faker->words(5)
        ]);

        Topic::create([
            'name' => 'JavaScript',
            'description' => $faker->paragraph(30),
            'keywords' => $faker->words(5)
        ]);

        Topic::create([
            'meta_name' => 'PHP',
            'description' => $faker->paragraph(30),
            'keywords' => $faker->words(5)
        ]);
    }
}

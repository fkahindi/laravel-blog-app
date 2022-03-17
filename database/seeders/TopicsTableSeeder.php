<?php

namespace Database\Seeders;

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
        'name' => $faker->randomElement([
            'name'=>'HTML',
            'name'=>'JavaScript',
            'name'=>'PHP'
        ]),
        'description' => $faker->paragraph(30),
        'keywords' => $faker->words(5)
        ]);
    }
}

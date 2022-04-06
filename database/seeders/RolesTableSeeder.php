<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'Admin',
            'description' => 'Can make app changes'
        ]);
        Role::create([
            'role' => 'Author',
            'description' => 'Can create posts and edit own posts'
        ]);
        Role::create([
            'role' => 'User',
            'description' => 'Can only read posts, comment and reply'
        ]);
    }
}

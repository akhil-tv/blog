<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('posts')->insert([
            'title' => 'POST - 10',
            'content' => 'This is the content of the first post.This is the content of the first post.This is the content of the first post.
                                This is the content of the first post.This is the content of the first post.This is the content of the first post.This is the content of the first post.This is the content of the first post.',
            'author' => 'John Doe',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}

<?php

namespace Database\Seeders;
use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Post;
        $p->title = 'This is my first post';
        $p->content = 'Hello there this is my first post this is a test how is your day going?';
        $p->user_id = 1; //user id 1

        $p->save();

        Post::factory(15)->create();
    }
}

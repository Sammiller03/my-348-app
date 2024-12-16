<?php

namespace Database\Seeders;
use App\Models\Comment;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Comment;
        $c->comment = 'Cool man!';
        //User id 2 is commenting on user id 1's post:
        $c->user_id = 2;
        $c->post_id = 1;

        $c->save();

        Comment::factory(10)->create();
    }
}

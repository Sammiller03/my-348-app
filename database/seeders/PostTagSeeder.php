<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $tags = Tag::all();

        //attach between 1 and 3 tags to each post
        foreach ($posts as $post) {
            $uniqueTagIds = $tags->pluck('id')->shuffle()->take(3)->toArray();
            
            $post->tags()->attach($uniqueTagIds);
        }
    }
}



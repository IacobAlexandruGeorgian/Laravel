<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class BlogPostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagCount = Tag::all()->count();

        if ($tagCount === 0) {
            $this->command->info('No tags found!');

            return;
        }

        $min = (int)$this->command->ask('Minimum tags on blog post?', 0);

        $max = min((int)$this->command->ask('Maximum tags on blog post?', $tagCount), $tagCount);

        BlogPost::all()->each(function (BlogPost $post) use($min, $max) {
            $take = random_int($min, $max);

            $tags = Tag::inRandomOrder()->take($take)->pluck('id');

            $post->tags()->sync($tags);
        });
    }
}

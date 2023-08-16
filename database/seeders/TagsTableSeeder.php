<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Science', 'Sport', 'Economy']);

        $tags->each(function ($name) {
            $tag = new Tag();
            $tag->name = $name;
            $tag->save();
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create();
        $tags = Tag::factory(20)->create();
        $posts = Post::factory(100)->create();

        foreach ($posts as $post)
        {
            $tagsIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIds);
        }

        Role::insert([
            ['name' => 'user'],
            ['name' => 'manager'],
            ['name' => 'admin'],
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'role' => '3',
            'password' => Hash::make('11223344'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 5 user dummy
        $users = User::factory(5)->create();

        // Buat posts untuk setiap user
        foreach ($users as $user) {
            Post::factory(3)->create([
                'user_id' => $user->id,
            ]);
        }

        // Buat some follows (relationship)
        foreach ($users as $user) {
            // User follow 2-3 user random
            $randomUsers = $users->where('id', '!=', $user->id)->random(rand(2, 3));
            $user->following()->attach($randomUsers->pluck('id'));
        }

        // Buat likes
        $posts = Post::all();
        foreach ($posts as $post) {
            // Random users like this post
            $randomLikers = $users->where('id', '!=', $post->user_id)->random(rand(1, 3));
            foreach ($randomLikers as $liker) {
                $liker->likes()->attach($post->id);
            }
        }
    }
}

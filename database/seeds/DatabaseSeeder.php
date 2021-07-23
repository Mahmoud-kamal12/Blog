<?php

use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(TagSeeder::class);
         $this->call(PostSeeder::class);
         $this->call(Post_TagSeeder::class);
         $this->call(CommentSeeder::class);
    }
}

<?php

use App\Post;
use App\Post_Tag;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Post_TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 100; $i++) {
            DB::transaction(function (){
                    DB::table('post_tag')->insert([
                    'post_id' => Post::all()->random()->id,
                    'tag_id'=> Tag::all()->random()->id,
                    'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                    'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
                ]);
            });
        }
    }
}

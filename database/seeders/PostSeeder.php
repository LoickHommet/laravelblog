<?php

namespace Database\Seeders;


use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Post::factory()->count(50)->create();


      //  DB::table('posts')->insert([
      //      'title'=> Str::random(10),
      //      'description'=> Str::random(100),
      //      'extrait'=> Str::random(20),

      //  ]);
    }
}

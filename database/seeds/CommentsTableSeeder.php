<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Comments;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $users = DB::table('users')->pluck('user_id');
        $videos = DB::table('videos')->pluck('videos_id');
        
        foreach(range(1,10) as $index){
            $comments = Comments::create([
                'comment_body' => $faker->text(150),
                'user_id' => $faker->randomElement($users),
                'videos_id' => $faker->randomElement($videos),
            ]);
        }
        
    }
}

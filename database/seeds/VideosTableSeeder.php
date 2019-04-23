<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Videos;
class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = DB::table('users')->pluck('user_id');

        foreach(range(1,30) as $index){
           $videos =  Videos::create([
                'title' => $faker->text(20),
                'description' => $faker->text(200),
                'url' => $faker->url(),
                'thumbnailUrl' => $faker->imageUrl(1200,600),
                'user_id' => $faker->randomElement($users)
            ]);
        }
    }
}

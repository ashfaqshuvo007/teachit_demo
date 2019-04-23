<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Users;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        //$candidates = Candidate::lists('user_id');

        foreach(range(1,20) as $index){
            Users::create([
                'name' => $faker->userName(),
                'email' => $faker->safeEmail(),
                'password' => 'secret',
                'avatar' => $faker->imageUrl(600,400)
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;
use \App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        $faker = \Faker\Factory::create('zh_TW');
        
        foreach( range(1,25) as $number ){
            $user = new User;
            $user->user_name = $faker->name;
            $user->email = $faker->email;
            $user->save();
        }
    }
}

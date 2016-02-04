<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;
use \App\Models\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::truncate();
        
        $faker = \Faker\Factory::create('zh_TW');
        
        foreach( range(1,25) as $number ){
            $photo = new Photo;
            $id = rand(1,25);
            $photo->user_name = \App\Models\User::find($id)->user_name;
//            $photo->data = 
            $photo->description = $faker->sentence;
            $photo->save();
        }
    }
}

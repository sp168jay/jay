<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;
use \App\Models\Test;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Test::truncate();
        
        $faker = \Faker\Factory::create('zh_TW');
        
        foreach( range(1,10) as $number ){
//            \App\Models\Test::create([
//                'data'    => 'seeder 輸入的',
//                'YesNo'   => rand(0,1),
//                '數字'     => $number,
//                '日期'    => Carbon::now()->addDays($number),
//                '內容'    => $faker->sentence
//            ]);
            $test = new Test;
            $test->data = '物件化 輸入 with namespace';
            $test->save();
        }
    }
}

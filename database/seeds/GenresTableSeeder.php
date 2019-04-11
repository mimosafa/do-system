<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genres')->delete();
        
        \DB::table('genres')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '屋台',
                'created_at' => '2019-04-11 19:08:42',
                'updated_at' => '2019-04-11 19:08:42',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '軽食',
                'created_at' => '2019-04-11 19:15:29',
                'updated_at' => '2019-04-11 19:15:29',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'カレー',
                'created_at' => '2019-04-11 19:16:20',
                'updated_at' => '2019-04-11 19:16:20',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => '和食',
                'created_at' => '2019-04-11 19:22:32',
                'updated_at' => '2019-04-11 19:22:32',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => '洋食',
                'created_at' => '2019-04-11 19:22:43',
                'updated_at' => '2019-04-11 19:22:43',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => '中華',
                'created_at' => '2019-04-11 19:22:50',
                'updated_at' => '2019-04-11 19:22:50',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => '肉',
                'created_at' => '2019-04-11 20:16:04',
                'updated_at' => '2019-04-11 20:16:04',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'チキン',
                'created_at' => '2019-04-11 20:30:47',
                'updated_at' => '2019-04-11 20:30:47',
            ),
        ));
        
        
    }
}
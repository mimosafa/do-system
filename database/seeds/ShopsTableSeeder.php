<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shops')->delete();
        
        \DB::table('shops')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'vendor_id' => 1,
                'name' => '東京堂',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-12 20:11:41',
                'updated_at' => '2019-04-18 17:52:18',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'vendor_id' => 1,
                'name' => '塩だれ本舗',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-12 20:11:52',
                'updated_at' => '2019-04-18 17:52:34',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'vendor_id' => 4,
                'name' => 'ボナペティ',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-12 20:12:44',
                'updated_at' => '2019-04-18 17:52:46',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'vendor_id' => 73,
                'name' => 'ミラーン',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-18 17:58:26',
                'updated_at' => '2019-04-18 17:58:45',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'vendor_id' => 47,
                'name' => '和食 しの',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-18 18:02:03',
                'updated_at' => '2019-04-18 18:02:13',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'vendor_id' => 199,
                'name' => 'TIKI COFFEE',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-18 20:40:38',
                'updated_at' => '2019-04-18 20:41:34',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'vendor_id' => 183,
                'name' => 'Grill Tokyo',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-18 20:45:00',
                'updated_at' => '2019-04-18 20:45:13',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 1,
                'vendor_id' => 42,
                'name' => 'yummy-E',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-19 21:05:33',
                'updated_at' => '2019-04-22 10:27:44',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 1,
                'vendor_id' => 132,
                'name' => '一誠堂',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-19 21:07:06',
                'updated_at' => '2019-04-19 21:16:28',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 1,
                'vendor_id' => 100,
                'name' => 'Julie\'s spices',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-19 21:08:01',
                'updated_at' => '2019-04-19 21:16:08',
            ),
        ));
        
        
    }
}
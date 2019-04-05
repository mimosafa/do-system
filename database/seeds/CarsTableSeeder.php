<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cars')->delete();
        
        \DB::table('cars')->insert(array (
            0 => 
            array (
                'id' => 1,
                'vendor_id' => 1,
                'name' => 'ベンツ',
                'vin' => '品川88つ555',
                'status' => 1,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-04 07:19:22',
            ),
            1 => 
            array (
                'id' => 2,
                'vendor_id' => 1,
                'name' => 'トウキョウドゥグラマン',
                'vin' => '品川88そ7246',
                'status' => 1,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-04 04:31:30',
            ),
            2 => 
            array (
                'id' => 3,
                'vendor_id' => 1,
                'name' => 'トウキョウドゥグラマン搬入車',
                'vin' => '品川100す251',
                'status' => 0,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-03 08:42:36',
            ),
            3 => 
            array (
                'id' => 4,
                'vendor_id' => 1,
                'name' => 'ドック車',
                'vin' => '品川800さ3127',
                'status' => 0,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-03 08:42:36',
            ),
            4 => 
            array (
                'id' => 5,
                'vendor_id' => 4,
                'name' => 'ボナペティ',
                'vin' => '練馬800す2669',
                'status' => 1,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-04 09:18:28',
            ),
            5 => 
            array (
                'id' => 6,
                'vendor_id' => 2,
                'name' => 'elephant box',
                'vin' => '練馬800す2388',
                'status' => 0,
                'created_at' => '2019-04-04 03:25:56',
                'updated_at' => '2019-04-04 03:25:56',
            ),
            6 => 
            array (
                'id' => 7,
                'vendor_id' => 1,
                'name' => 'ネオ2号',
                'vin' => '品川880あ740',
                'status' => 0,
                'created_at' => '2019-04-04 03:58:24',
                'updated_at' => '2019-04-04 03:58:24',
            ),
            7 => 
            array (
                'id' => 8,
                'vendor_id' => 14,
                'name' => 'パラダイス',
                'vin' => '品川830さ1966',
                'status' => 1,
                'created_at' => '2019-04-04 04:20:33',
                'updated_at' => '2019-04-04 09:17:56',
            ),
        ));
        
        
    }
}
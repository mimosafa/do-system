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
                'user_id' => 1,
                'vendor_id' => 1,
                'name' => 'ベンツ',
                'vin' => '品川88つ555',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-16 18:33:55',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'vendor_id' => 1,
                'name' => 'トウキョウドゥグラマン',
                'vin' => '品川88そ7246',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-04 04:31:30',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'vendor_id' => 1,
                'name' => 'グラマン搬入車',
                'vin' => '品川100す251',
                'status' => 7,
                'order' => 0,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-16 18:25:29',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'vendor_id' => 1,
                'name' => 'ドック車',
                'vin' => '品川800さ3127',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-09 18:57:00',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'vendor_id' => 4,
                'name' => 'ボナペティ',
                'vin' => '練馬800す2669',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-04 09:18:28',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'vendor_id' => 2,
                'name' => 'elephant box',
                'vin' => '練馬800す2388',
                'status' => 7,
                'order' => 0,
                'created_at' => '2019-04-04 03:25:56',
                'updated_at' => '2019-04-09 18:57:43',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'vendor_id' => 1,
                'name' => 'ネオ2号',
                'vin' => '品川880あ740',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-04 03:58:24',
                'updated_at' => '2019-04-09 18:57:59',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 1,
                'vendor_id' => 14,
                'name' => 'パラダイス',
                'vin' => '品川830さ1966',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-04 04:20:33',
                'updated_at' => '2019-04-04 09:17:56',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 1,
                'vendor_id' => 3,
                'name' => 'HANA',
                'vin' => '品川41き329',
                'status' => 9,
                'order' => 0,
                'created_at' => '2019-04-09 10:53:54',
                'updated_at' => '2019-04-16 18:20:44',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 1,
                'vendor_id' => 8,
                'name' => 'タコデリオ３号車',
                'vin' => '品川800す5439',
                'status' => 7,
                'order' => 0,
                'created_at' => '2019-04-09 11:13:44',
                'updated_at' => '2019-04-16 18:24:32',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 1,
                'vendor_id' => 9,
                'name' => 'M\'s com上野号',
                'vin' => '春日部40さ9588',
                'status' => 9,
                'order' => 0,
                'created_at' => '2019-04-09 11:39:09',
                'updated_at' => '2019-04-16 18:24:44',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 1,
                'vendor_id' => 10,
                'name' => 'スブラキハウス１号車',
                'vin' => '山梨800さ7184',
                'status' => 9,
                'order' => 0,
                'created_at' => '2019-04-09 11:40:03',
                'updated_at' => '2019-04-16 18:24:54',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 1,
                'vendor_id' => 17,
                'name' => 'ビーンズカート',
                'vin' => '練馬880あ34',
                'status' => 9,
                'order' => 0,
                'created_at' => '2019-04-09 18:25:39',
                'updated_at' => '2019-04-16 18:25:03',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 1,
                'vendor_id' => 18,
                'name' => 'マハッタ',
                'vin' => '山梨800さ6556',
                'status' => 9,
                'order' => 0,
                'created_at' => '2019-04-09 18:28:31',
                'updated_at' => '2019-04-16 18:25:12',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 1,
                'vendor_id' => 210,
                'name' => 'カルフォルニアカフェ フラワーズ',
                'vin' => '大宮830そ58',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-18 19:55:38',
                'updated_at' => '2019-04-18 19:55:45',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 1,
                'vendor_id' => 11,
                'name' => 'アジアンランチ21号車',
                'vin' => '川崎480い3456',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-18 19:56:51',
                'updated_at' => '2019-04-18 19:57:15',
            ),
        ));
        
        
    }
}
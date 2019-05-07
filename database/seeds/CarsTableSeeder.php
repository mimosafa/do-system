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
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-03 08:42:36',
                'updated_at' => '2019-04-23 15:22:46',
            ),
            1 =>
            array (
                'id' => 2,
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
                'vendor_id' => 1,
                'name' => 'ネオ2号',
                'vin' => '品川880あ740',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-04 03:58:24',
                'updated_at' => '2019-04-23 14:42:37',
            ),
            7 =>
            array (
                'id' => 8,
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
                'vendor_id' => 3,
                'name' => 'HANA',
                'vin' => '品川41き329',
                'status' => 8,
                'order' => 0,
                'created_at' => '2019-04-09 10:53:54',
                'updated_at' => '2019-04-16 18:20:44',
            ),
            9 =>
            array (
                'id' => 10,
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
                'vendor_id' => 9,
                'name' => 'M\'s com上野号',
                'vin' => '春日部40さ9588',
                'status' => 8,
                'order' => 0,
                'created_at' => '2019-04-09 11:39:09',
                'updated_at' => '2019-04-16 18:24:44',
            ),
            11 =>
            array (
                'id' => 12,
                'vendor_id' => 10,
                'name' => 'スブラキハウス１号車',
                'vin' => '山梨800さ7184',
                'status' => 8,
                'order' => 0,
                'created_at' => '2019-04-09 11:40:03',
                'updated_at' => '2019-04-16 18:24:54',
            ),
            12 =>
            array (
                'id' => 13,
                'vendor_id' => 17,
                'name' => 'ビーンズカート',
                'vin' => '練馬880あ34',
                'status' => 8,
                'order' => 0,
                'created_at' => '2019-04-09 18:25:39',
                'updated_at' => '2019-04-16 18:25:03',
            ),
            13 =>
            array (
                'id' => 14,
                'vendor_id' => 18,
                'name' => 'マハッタ',
                'vin' => '山梨800さ6556',
                'status' => 8,
                'order' => 0,
                'created_at' => '2019-04-09 18:28:31',
                'updated_at' => '2019-04-16 18:25:12',
            ),
            14 =>
            array (
                'id' => 15,
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
                'vendor_id' => 11,
                'name' => 'アジアンランチ21号車',
                'vin' => '川崎480い3456',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-18 19:56:51',
                'updated_at' => '2019-04-18 19:57:15',
            ),
            16 =>
            array (
                'id' => 17,
                'vendor_id' => 73,
                'name' => 'BIG号',
                'vin' => '足立800せ6320',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 13:55:27',
                'updated_at' => '2019-04-23 13:55:36',
            ),
            17 =>
            array (
                'id' => 18,
                'vendor_id' => 26,
                'name' => 'サウスパーク',
                'vin' => '多摩880あ980',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 14:03:02',
                'updated_at' => '2019-04-23 14:03:22',
            ),
            18 =>
            array (
                'id' => 19,
                'vendor_id' => 53,
                'name' => '軽',
                'vin' => '八王子480え7968',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 14:16:04',
                'updated_at' => '2019-04-23 14:16:13',
            ),
            19 =>
            array (
                'id' => 20,
                'vendor_id' => 156,
                'name' => 'クイックデリバリー',
                'vin' => '練馬800す7245',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 14:19:59',
                'updated_at' => '2019-04-23 14:20:06',
            ),
            20 =>
            array (
                'id' => 21,
                'vendor_id' => 100,
                'name' => 'ジュリー号',
                'vin' => '品川880あ252',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 14:58:48',
                'updated_at' => '2019-04-23 14:59:14',
            ),
            21 =>
            array (
                'id' => 22,
                'vendor_id' => 259,
                'name' => 'Comida 沖縄',
                'vin' => '川崎480い8755',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 15:12:06',
                'updated_at' => '2019-04-23 15:12:17',
            ),
            22 =>
            array (
                'id' => 23,
                'vendor_id' => 42,
                'name' => 'キャリー',
                'vin' => '品川480く8795',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 15:15:49',
                'updated_at' => '2019-04-23 15:16:07',
            ),
            23 =>
            array (
                'id' => 24,
                'vendor_id' => 47,
                'name' => '和食 しの',
                'vin' => '足立480こ7269',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 15:52:38',
                'updated_at' => '2019-04-23 15:53:02',
            ),
            24 =>
            array (
                'id' => 25,
                'vendor_id' => 294,
                'name' => 'キャラバン',
                'vin' => '足立800そ331',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 17:51:26',
                'updated_at' => '2019-04-23 17:51:33',
            ),
            25 =>
            array (
                'id' => 26,
                'vendor_id' => 346,
                'name' => 'オリーブ亭',
                'vin' => '千葉800せ7069',
                'status' => 3,
                'order' => 0,
                'created_at' => '2019-04-23 18:25:36',
                'updated_at' => '2019-04-23 18:25:42',
            ),
        ));


    }
}

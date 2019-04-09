<?php

use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('vendors')->delete();

        \DB::table('vendors')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'トウキョウドゥ',
                'status' => 1,
                'created_at' => '2019-04-02 10:51:57',
                'updated_at' => '2019-04-04 09:20:16',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'elephant box',
                'status' => 8,
                'created_at' => '2019-04-02 10:51:57',
                'updated_at' => '2019-04-09 18:23:52',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'HANAカレー',
                'status' => 9,
                'created_at' => '2019-04-02 10:51:57',
                'updated_at' => '2019-04-03 10:39:09',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'ボナペティ',
                'status' => 1,
                'created_at' => '2019-04-02 10:51:57',
                'updated_at' => '2019-04-02 10:51:57',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => '朔（ｓａｋｕ）',
                'status' => 9,
                'created_at' => '2019-04-03 03:14:15',
                'updated_at' => '2019-04-03 06:15:24',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'ランチ・ランチ',
                'status' => 9,
                'created_at' => '2019-04-03 03:35:15',
                'updated_at' => '2019-04-03 06:15:00',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'イーストダイナー',
                'status' => 9,
                'created_at' => '2019-04-03 06:22:59',
                'updated_at' => '2019-04-03 06:23:07',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'タコデリオ',
                'status' => 8,
                'created_at' => '2019-04-03 06:30:26',
                'updated_at' => '2019-04-03 06:30:32',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'M\'s com',
                'status' => 9,
                'created_at' => '2019-04-03 06:42:56',
                'updated_at' => '2019-04-03 06:43:21',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'スブラキハウス',
                'status' => 9,
                'created_at' => '2019-04-03 06:58:37',
                'updated_at' => '2019-04-09 19:11:11',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'アジアンランチ',
                'status' => 1,
                'created_at' => '2019-04-03 07:01:13',
                'updated_at' => '2019-04-03 07:01:37',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'YammY',
                'status' => 9,
                'created_at' => '2019-04-03 07:32:05',
                'updated_at' => '2019-04-04 03:48:15',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'スープ ファクトリー',
                'status' => 9,
                'created_at' => '2019-04-04 04:19:36',
                'updated_at' => '2019-04-04 04:19:46',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'パラダイス',
                'status' => 1,
                'created_at' => '2019-04-04 04:19:59',
                'updated_at' => '2019-04-04 04:20:06',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'ＴＲＡＦＦＩＣ　ＣＡＦＥ',
                'status' => 9,
                'created_at' => '2019-04-08 19:10:29',
                'updated_at' => '2019-04-09 18:19:59',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'アレックスコーヒー',
                'status' => 9,
                'created_at' => '2019-04-09 10:32:44',
                'updated_at' => '2019-04-09 18:22:10',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'ビーンズカート',
                'status' => 9,
                'created_at' => '2019-04-09 10:33:14',
                'updated_at' => '2019-04-09 19:12:05',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'マハッタ',
                'status' => 9,
                'created_at' => '2019-04-09 10:33:29',
                'updated_at' => '2019-04-09 19:12:21',
            ),
        ));


    }
}

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
                'user_id' => 1,
                'name' => 'トウキョウドゥ',
                'status' => 3,
                'created_at' => '2019-04-02 10:51:57',
                'updated_at' => '2019-04-04 09:20:16',
            ),
            1 =>
            array (
                'id' => 2,
                'user_id' => 1,
                'name' => 'elephant box',
                'status' => 7,
                'created_at' => '2019-04-02 10:51:57',
                'updated_at' => '2019-04-09 18:23:52',
            ),
            2 =>
            array (
                'id' => 3,
                'user_id' => 1,
                'name' => 'HANAカレー',
                'status' => 8,
                'created_at' => '2019-04-02 10:51:57',
                'updated_at' => '2019-04-03 10:39:09',
            ),
            3 =>
            array (
                'id' => 4,
                'user_id' => 1,
                'name' => 'ボナペティ',
                'status' => 3,
                'created_at' => '2019-04-02 10:51:57',
                'updated_at' => '2019-04-02 10:51:57',
            ),
            4 =>
            array (
                'id' => 5,
                'user_id' => 1,
                'name' => '朔（ｓａｋｕ）',
                'status' => 8,
                'created_at' => '2019-04-03 03:14:15',
                'updated_at' => '2019-04-03 06:15:24',
            ),
            5 =>
            array (
                'id' => 6,
                'user_id' => 1,
                'name' => 'ランチ・ランチ',
                'status' => 8,
                'created_at' => '2019-04-03 03:35:15',
                'updated_at' => '2019-04-03 06:15:00',
            ),
            6 =>
            array (
                'id' => 7,
                'user_id' => 1,
                'name' => 'イーストダイナー',
                'status' => 8,
                'created_at' => '2019-04-03 06:22:59',
                'updated_at' => '2019-04-03 06:23:07',
            ),
            7 =>
            array (
                'id' => 8,
                'user_id' => 1,
                'name' => 'タコデリオ',
                'status' => 7,
                'created_at' => '2019-04-03 06:30:26',
                'updated_at' => '2019-04-03 06:30:32',
            ),
            8 =>
            array (
                'id' => 9,
                'user_id' => 1,
                'name' => 'M\'s com',
                'status' => 8,
                'created_at' => '2019-04-03 06:42:56',
                'updated_at' => '2019-04-03 06:43:21',
            ),
            9 =>
            array (
                'id' => 10,
                'user_id' => 1,
                'name' => 'スブラキハウス',
                'status' => 8,
                'created_at' => '2019-04-03 06:58:37',
                'updated_at' => '2019-04-09 19:11:11',
            ),
            10 =>
            array (
                'id' => 11,
                'user_id' => 1,
                'name' => 'アジアンランチ',
                'status' => 3,
                'created_at' => '2019-04-03 07:01:13',
                'updated_at' => '2019-04-03 07:01:37',
            ),
            11 =>
            array (
                'id' => 12,
                'user_id' => 1,
                'name' => 'YammY',
                'status' => 8,
                'created_at' => '2019-04-03 07:32:05',
                'updated_at' => '2019-04-04 03:48:15',
            ),
            12 =>
            array (
                'id' => 13,
                'user_id' => 1,
                'name' => 'スープ ファクトリー',
                'status' => 8,
                'created_at' => '2019-04-04 04:19:36',
                'updated_at' => '2019-04-04 04:19:46',
            ),
            13 =>
            array (
                'id' => 14,
                'user_id' => 1,
                'name' => 'パラダイス',
                'status' => 3,
                'created_at' => '2019-04-04 04:19:59',
                'updated_at' => '2019-04-04 04:20:06',
            ),
            14 =>
            array (
                'id' => 15,
                'user_id' => 1,
                'name' => 'ＴＲＡＦＦＩＣ　ＣＡＦＥ',
                'status' => 8,
                'created_at' => '2019-04-08 19:10:29',
                'updated_at' => '2019-04-09 18:19:59',
            ),
            15 =>
            array (
                'id' => 16,
                'user_id' => 1,
                'name' => 'アレックスコーヒー',
                'status' => 8,
                'created_at' => '2019-04-09 10:32:44',
                'updated_at' => '2019-04-09 18:22:10',
            ),
            16 =>
            array (
                'id' => 17,
                'user_id' => 1,
                'name' => 'ビーンズカート',
                'status' => 8,
                'created_at' => '2019-04-09 10:33:14',
                'updated_at' => '2019-04-09 19:12:05',
            ),
            17 =>
            array (
                'id' => 18,
                'user_id' => 1,
                'name' => 'マハッタ',
                'status' => 8,
                'created_at' => '2019-04-09 10:33:29',
                'updated_at' => '2019-04-09 19:12:21',
            ),
            18 =>
            array (
                'id' => 19,
                'user_id' => 1,
                'name' => '大上海',
                'status' => 8,
                'created_at' => '2019-04-16 11:04:46',
                'updated_at' => '2019-04-16 14:49:08',
            ),
            19 =>
            array (
                'id' => 20,
                'user_id' => 1,
                'name' => 'メーアン',
                'status' => 8,
                'created_at' => '2019-04-16 11:04:58',
                'updated_at' => '2019-04-16 15:15:15',
            ),
            20 =>
            array (
                'id' => 21,
                'user_id' => 1,
                'name' => 'Ｔｏｎｇｕｅ　Ｔａｂｌｅ',
                'status' => 8,
                'created_at' => '2019-04-16 11:05:13',
                'updated_at' => '2019-04-16 15:17:12',
            ),
            21 =>
            array (
                'id' => 22,
                'user_id' => 1,
                'name' => 'クレイジータコス',
                'status' => 7,
                'created_at' => '2019-04-16 11:05:22',
                'updated_at' => '2019-04-16 15:17:22',
            ),
            22 =>
            array (
                'id' => 23,
                'user_id' => 1,
                'name' => 'デリデミーナ',
                'status' => 8,
                'created_at' => '2019-04-16 11:05:33',
                'updated_at' => '2019-04-16 15:17:31',
            ),
            23 =>
            array (
                'id' => 24,
                'user_id' => 1,
                'name' => 'Ｅｇｇ　Ｒａｉｎｂｏｗ',
                'status' => 3,
                'created_at' => '2019-04-16 11:05:43',
                'updated_at' => '2019-04-16 11:20:08',
            ),
            24 =>
            array (
                'id' => 25,
                'user_id' => 1,
                'name' => '給食当番6号車',
                'status' => 8,
                'created_at' => '2019-04-16 11:05:51',
                'updated_at' => '2019-04-16 15:17:42',
            ),
            25 =>
            array (
                'id' => 26,
                'user_id' => 1,
                'name' => 'サウスパーク',
                'status' => 3,
                'created_at' => '2019-04-16 11:06:00',
                'updated_at' => '2019-04-16 11:09:31',
            ),
            26 =>
            array (
                'id' => 27,
                'user_id' => 1,
                'name' => 'パパガヤデリ',
                'status' => 3,
                'created_at' => '2019-04-16 11:06:08',
                'updated_at' => '2019-04-16 11:09:42',
            ),
            27 =>
            array (
                'id' => 28,
                'user_id' => 1,
                'name' => 'ＡＦＲＯ－ＢＵＲＧＥＲ',
                'status' => 8,
                'created_at' => '2019-04-16 11:06:18',
                'updated_at' => '2019-04-16 15:49:48',
            ),
            28 =>
            array (
                'id' => 29,
                'user_id' => 1,
                'name' => 'Ｒｙｕｋｙｕ　Ｗａｖｅ',
                'status' => 8,
                'created_at' => '2019-04-16 11:06:27',
                'updated_at' => '2019-04-16 15:49:58',
            ),
            29 =>
            array (
                'id' => 30,
                'user_id' => 1,
                'name' => 'ＲＵＮＴＡ',
                'status' => 8,
                'created_at' => '2019-04-16 11:06:36',
                'updated_at' => '2019-04-16 15:50:08',
            ),
            30 =>
            array (
                'id' => 31,
                'user_id' => 1,
                'name' => 'ｒｕｅ　ＣｈａｔｏｎＳ',
                'status' => 8,
                'created_at' => '2019-04-16 11:06:46',
                'updated_at' => '2019-04-16 15:50:17',
            ),
            31 =>
            array (
                'id' => 32,
                'user_id' => 1,
                'name' => '元祖　横浜カレーパン',
                'status' => 7,
                'created_at' => '2019-04-16 11:06:54',
                'updated_at' => '2019-04-16 15:50:28',
            ),
            32 =>
            array (
                'id' => 33,
                'user_id' => 1,
                'name' => 'あいうえお',
                'status' => 8,
                'created_at' => '2019-04-16 11:07:02',
                'updated_at' => '2019-04-16 15:51:51',
            ),
            33 =>
            array (
                'id' => 34,
                'user_id' => 1,
                'name' => 'カリー・カリー',
                'status' => 7,
                'created_at' => '2019-04-16 11:07:12',
                'updated_at' => '2019-04-16 15:51:59',
            ),
            34 =>
            array (
                'id' => 35,
                'user_id' => 1,
                'name' => 'インディ',
                'status' => 8,
                'created_at' => '2019-04-16 11:07:23',
                'updated_at' => '2019-04-16 15:52:08',
            ),
            35 =>
            array (
                'id' => 36,
                'user_id' => 1,
                'name' => 'ロコロール',
                'status' => 8,
                'created_at' => '2019-04-16 11:07:32',
                'updated_at' => '2019-04-16 15:52:18',
            ),
            36 =>
            array (
                'id' => 37,
                'user_id' => 1,
                'name' => 'ヴァジアーナ・セブン',
                'status' => 8,
                'created_at' => '2019-04-16 11:07:40',
                'updated_at' => '2019-04-16 15:52:47',
            ),
            37 =>
            array (
                'id' => 38,
                'user_id' => 1,
                'name' => 'アカシヤ',
                'status' => 8,
                'created_at' => '2019-04-16 11:07:50',
                'updated_at' => '2019-04-16 15:54:53',
            ),
            38 =>
            array (
                'id' => 39,
                'user_id' => 1,
                'name' => 'クアトロおじさん',
                'status' => 8,
                'created_at' => '2019-04-16 11:08:00',
                'updated_at' => '2019-04-16 15:55:01',
            ),
            39 =>
            array (
                'id' => 40,
                'user_id' => 1,
                'name' => 'ニューヨークパスタ',
                'status' => 8,
                'created_at' => '2019-04-16 11:08:10',
                'updated_at' => '2019-04-16 15:55:14',
            ),
            40 =>
            array (
                'id' => 41,
                'user_id' => 1,
                'name' => 'バン・ギャオ',
                'status' => 3,
                'created_at' => '2019-04-16 11:08:19',
                'updated_at' => '2019-04-16 11:20:26',
            ),
            41 =>
            array (
                'id' => 42,
                'user_id' => 1,
                'name' => 'yummy-E',
                'status' => 3,
                'created_at' => '2019-04-16 11:08:35',
                'updated_at' => '2019-04-16 11:10:02',
            ),
            42 =>
            array (
                'id' => 43,
                'user_id' => 1,
                'name' => '煌（ファン）',
                'status' => 8,
                'created_at' => '2019-04-16 11:08:45',
                'updated_at' => '2019-04-16 15:55:33',
            ),
            43 =>
            array (
                'id' => 44,
                'user_id' => 1,
                'name' => 'モトヤエクスプレス',
                'status' => 8,
                'created_at' => '2019-04-16 11:08:54',
                'updated_at' => '2019-04-16 15:55:42',
            ),
            44 =>
            array (
                'id' => 45,
                'user_id' => 1,
                'name' => 'クッキーメロンパン',
                'status' => 8,
                'created_at' => '2019-04-16 11:09:03',
                'updated_at' => '2019-04-16 15:55:50',
            ),
            45 =>
            array (
                'id' => 46,
                'user_id' => 1,
                'name' => 'VEGE TIME',
                'status' => 8,
                'created_at' => '2019-04-16 11:09:13',
                'updated_at' => '2019-04-16 15:55:59',
            ),
            46 =>
            array (
                'id' => 47,
                'user_id' => 1,
                'name' => '和食 しの',
                'status' => 3,
                'created_at' => '2019-04-16 11:10:36',
                'updated_at' => '2019-04-16 11:11:45',
            ),
            47 =>
            array (
                'id' => 48,
                'user_id' => 1,
                'name' => 'ＭＡＤＯ',
                'status' => 8,
                'created_at' => '2019-04-16 11:10:47',
                'updated_at' => '2019-04-16 17:19:55',
            ),
            48 =>
            array (
                'id' => 49,
                'user_id' => 1,
                'name' => 'jungle Foods',
                'status' => 7,
                'created_at' => '2019-04-16 11:10:57',
                'updated_at' => '2019-04-16 17:20:03',
            ),
            49 =>
            array (
                'id' => 50,
                'user_id' => 1,
                'name' => 'アフラテッロ　アレックス',
                'status' => 8,
                'created_at' => '2019-04-16 11:11:06',
                'updated_at' => '2019-04-16 17:20:11',
            ),
            50 =>
            array (
                'id' => 51,
                'user_id' => 1,
                'name' => 'LUCIE BUS',
                'status' => 8,
                'created_at' => '2019-04-16 11:11:15',
                'updated_at' => '2019-04-16 17:20:21',
            ),
            51 =>
            array (
                'id' => 52,
                'user_id' => 1,
                'name' => 'OmtRak',
                'status' => 3,
                'created_at' => '2019-04-16 11:11:23',
                'updated_at' => '2019-04-16 11:11:56',
            ),
            52 =>
            array (
                'id' => 53,
                'user_id' => 1,
                'name' => 'デリキムチ',
                'status' => 3,
                'created_at' => '2019-04-16 11:11:33',
                'updated_at' => '2019-04-16 11:12:06',
            ),
            53 =>
            array (
                'id' => 54,
                'user_id' => 1,
                'name' => 'ソフラカ',
                'status' => 8,
                'created_at' => '2019-04-16 11:12:42',
                'updated_at' => '2019-04-16 17:57:01',
            ),
            54 =>
            array (
                'id' => 55,
                'user_id' => 1,
                'name' => 'FLOW CAFÉ',
                'status' => 8,
                'created_at' => '2019-04-16 11:12:51',
                'updated_at' => '2019-04-16 17:58:03',
            ),
            55 =>
            array (
                'id' => 56,
                'user_id' => 1,
                'name' => '08 Café',
                'status' => 8,
                'created_at' => '2019-04-16 11:13:00',
                'updated_at' => '2019-04-16 17:58:10',
            ),
            56 =>
            array (
                'id' => 57,
                'user_id' => 1,
                'name' => 'ambulante café',
                'status' => 8,
                'created_at' => '2019-04-16 11:13:10',
                'updated_at' => '2019-04-16 17:58:19',
            ),
            57 =>
            array (
                'id' => 58,
                'user_id' => 1,
                'name' => 'SWEET VENOM',
                'status' => 8,
                'created_at' => '2019-04-16 11:13:19',
                'updated_at' => '2019-04-16 17:58:27',
            ),
            58 =>
            array (
                'id' => 59,
                'user_id' => 1,
                'name' => 'たこさん',
                'status' => 3,
                'created_at' => '2019-04-16 11:13:27',
                'updated_at' => '2019-04-16 11:20:41',
            ),
            59 =>
            array (
                'id' => 60,
                'user_id' => 1,
                'name' => 'TSUGUMI',
                'status' => 8,
                'created_at' => '2019-04-16 11:13:35',
                'updated_at' => '2019-04-16 18:02:20',
            ),
            60 =>
            array (
                'id' => 61,
                'user_id' => 1,
                'name' => '象の耳',
                'status' => 8,
                'created_at' => '2019-04-16 11:13:44',
                'updated_at' => '2019-04-16 18:02:30',
            ),
            61 =>
            array (
                'id' => 62,
                'user_id' => 1,
                'name' => 'KUNA（空海）',
                'status' => 8,
                'created_at' => '2019-04-16 11:13:52',
                'updated_at' => '2019-04-16 18:02:37',
            ),
            62 =>
            array (
                'id' => 63,
                'user_id' => 1,
                'name' => 'バブス',
                'status' => 7,
                'created_at' => '2019-04-16 11:14:01',
                'updated_at' => '2019-04-16 15:50:44',
            ),
            63 =>
            array (
                'id' => 64,
                'user_id' => 1,
                'name' => 'ランチQ',
                'status' => 8,
                'created_at' => '2019-04-16 11:14:10',
                'updated_at' => '2019-04-16 18:02:46',
            ),
            64 =>
            array (
                'id' => 65,
                'user_id' => 1,
                'name' => '大月珈琲店',
                'status' => 8,
                'created_at' => '2019-04-16 11:14:18',
                'updated_at' => '2019-04-16 18:02:53',
            ),
            65 =>
            array (
                'id' => 66,
                'user_id' => 1,
                'name' => 'スターケバブ',
                'status' => 8,
                'created_at' => '2019-04-16 11:14:28',
                'updated_at' => '2019-04-16 18:03:03',
            ),
            66 =>
            array (
                'id' => 67,
                'user_id' => 1,
                'name' => 'ギズモカフェ',
                'status' => 8,
                'created_at' => '2019-04-16 11:14:36',
                'updated_at' => '2019-04-16 18:03:11',
            ),
            67 =>
            array (
                'id' => 68,
                'user_id' => 1,
                'name' => 'ワンダーデッシュ',
                'status' => 3,
                'created_at' => '2019-04-16 11:14:44',
                'updated_at' => '2019-04-16 11:20:53',
            ),
            68 =>
            array (
                'id' => 69,
                'user_id' => 1,
                'name' => 'ラクシュミー',
                'status' => 8,
                'created_at' => '2019-04-16 11:14:52',
                'updated_at' => '2019-04-16 18:32:04',
            ),
            69 =>
            array (
                'id' => 70,
                'user_id' => 1,
                'name' => 'ゴーゴーカレー',
                'status' => 8,
                'created_at' => '2019-04-16 11:15:03',
                'updated_at' => '2019-04-16 18:32:11',
            ),
            70 =>
            array (
                'id' => 71,
                'user_id' => 1,
                'name' => 'Yummy Yummy',
                'status' => 8,
                'created_at' => '2019-04-16 11:15:12',
                'updated_at' => '2019-04-16 18:32:17',
            ),
            71 =>
            array (
                'id' => 72,
                'user_id' => 1,
                'name' => 'サンシャインカフェ',
                'status' => 8,
                'created_at' => '2019-04-16 11:15:20',
                'updated_at' => '2019-04-16 18:32:24',
            ),
            72 =>
            array (
                'id' => 73,
                'user_id' => 1,
                'name' => 'ミラーン',
                'status' => 3,
                'created_at' => '2019-04-16 11:15:29',
                'updated_at' => '2019-04-16 11:21:04',
            ),
            73 =>
            array (
                'id' => 74,
                'user_id' => 1,
                'name' => 'カシミールカレー',
                'status' => 8,
                'created_at' => '2019-04-16 11:15:38',
                'updated_at' => '2019-04-16 17:20:49',
            ),
            74 =>
            array (
                'id' => 75,
                'user_id' => 1,
                'name' => 'またたび屋',
                'status' => 8,
                'created_at' => '2019-04-16 11:15:46',
                'updated_at' => '2019-04-16 17:20:57',
            ),
            75 =>
            array (
                'id' => 76,
                'user_id' => 1,
                'name' => 'マルシェ',
                'status' => 3,
                'created_at' => '2019-04-16 11:15:54',
                'updated_at' => '2019-04-16 11:21:21',
            ),
            76 =>
            array (
                'id' => 77,
                'user_id' => 1,
                'name' => 'Assorti(アソルティ）',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:16:03',
                    'updated_at' => '2019-04-16 18:54:28',
                ),
                77 =>
                array (
                    'id' => 78,
                    'user_id' => 1,
                    'name' => 'メロンちゃんのメロンパン',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:16:13',
                    'updated_at' => '2019-04-16 18:58:06',
                ),
                78 =>
                array (
                    'id' => 79,
                    'user_id' => 1,
                    'name' => '給食当番123号',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:16:21',
                    'updated_at' => '2019-04-16 18:58:13',
                ),
                79 =>
                array (
                    'id' => 80,
                    'user_id' => 1,
                    'name' => 'Ｒ511',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:16:31',
                    'updated_at' => '2019-04-16 18:54:36',
                ),
                80 =>
                array (
                    'id' => 81,
                    'user_id' => 1,
                    'name' => 'TUB CAT',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:16:39',
                    'updated_at' => '2019-04-16 18:55:32',
                ),
                81 =>
                array (
                    'id' => 82,
                    'user_id' => 1,
                    'name' => 'HappyOrange',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:16:48',
                    'updated_at' => '2019-04-16 18:58:21',
                ),
                82 =>
                array (
                    'id' => 83,
                    'user_id' => 1,
                    'name' => 'マツゲン',
                    'status' => 7,
                    'created_at' => '2019-04-16 11:16:57',
                    'updated_at' => '2019-04-16 18:58:31',
                ),
                83 =>
                array (
                    'id' => 84,
                    'user_id' => 1,
                    'name' => 'Dudes',
                    'status' => 3,
                    'created_at' => '2019-04-16 11:17:08',
                    'updated_at' => '2019-04-16 11:21:34',
                ),
                84 =>
                array (
                    'id' => 85,
                    'user_id' => 1,
                    'name' => 'Retoro\'n Box',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:17:17',
                    'updated_at' => '2019-04-16 17:58:44',
                ),
                85 =>
                array (
                    'id' => 86,
                    'user_id' => 1,
                    'name' => 'Kitchen Curry香房',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:17:25',
                    'updated_at' => '2019-04-16 17:58:52',
                ),
                86 =>
                array (
                    'id' => 87,
                    'user_id' => 1,
                    'name' => 'SPIRAL DRIFTER CAFÉ',
                    'status' => 3,
                    'created_at' => '2019-04-16 11:17:37',
                    'updated_at' => '2019-04-16 11:21:54',
                ),
                87 =>
                array (
                    'id' => 88,
                    'user_id' => 1,
                    'name' => 'ジャランジャラン',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:17:46',
                    'updated_at' => '2019-04-16 18:56:55',
                ),
                88 =>
                array (
                    'id' => 89,
                    'user_id' => 1,
                    'name' => 'グレンツェン',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:17:54',
                    'updated_at' => '2019-04-16 18:57:04',
                ),
                89 =>
                array (
                    'id' => 90,
                    'user_id' => 1,
                    'name' => 'GRIFFIN',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:18:03',
                    'updated_at' => '2019-04-16 18:55:41',
                ),
                90 =>
                array (
                    'id' => 91,
                    'user_id' => 1,
                    'name' => '白猫堂',
                    'status' => 3,
                    'created_at' => '2019-04-16 11:18:12',
                    'updated_at' => '2019-04-16 18:58:42',
                ),
                91 =>
                array (
                    'id' => 92,
                    'user_id' => 1,
                    'name' => 'ジャミング',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:18:22',
                    'updated_at' => '2019-04-16 18:54:57',
                ),
                92 =>
                array (
                    'id' => 93,
                    'user_id' => 1,
                    'name' => 'micro-café',
                    'status' => 7,
                    'created_at' => '2019-04-16 11:18:36',
                    'updated_at' => '2019-04-16 18:54:46',
                ),
                93 =>
                array (
                    'id' => 94,
                    'user_id' => 1,
                    'name' => 'おこクレ亭',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:18:44',
                    'updated_at' => '2019-04-16 18:57:14',
                ),
                94 =>
                array (
                    'id' => 95,
                    'user_id' => 1,
                    'name' => 'たんぽや',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:18:53',
                    'updated_at' => '2019-04-16 18:57:21',
                ),
                95 =>
                array (
                    'id' => 96,
                    'user_id' => 1,
                    'name' => 'ミート屋本舗',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:19:02',
                    'updated_at' => '2019-04-16 15:16:57',
                ),
                96 =>
                array (
                    'id' => 97,
                    'user_id' => 1,
                    'name' => 'NAP JAPAN',
                    'status' => 3,
                    'created_at' => '2019-04-16 11:19:12',
                    'updated_at' => '2019-04-16 11:22:09',
                ),
                97 =>
                array (
                    'id' => 98,
                    'user_id' => 1,
                    'name' => 'カフェ　アローマ',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:19:20',
                    'updated_at' => '2019-04-16 15:16:42',
                ),
                98 =>
                array (
                    'id' => 99,
                    'user_id' => 1,
                    'name' => 'MANMA隊',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:19:29',
                    'updated_at' => '2019-04-16 15:16:30',
                ),
                99 =>
                array (
                    'id' => 100,
                    'user_id' => 1,
                    'name' => 'Julie\'s spices',
                    'status' => 3,
                    'created_at' => '2019-04-16 11:19:37',
                    'updated_at' => '2019-04-16 11:22:19',
                ),
                100 =>
                array (
                    'id' => 101,
                    'user_id' => 1,
                    'name' => 'ボーノボーノ',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:33:56',
                    'updated_at' => '2019-04-16 18:55:08',
                ),
                101 =>
                array (
                    'id' => 102,
                    'user_id' => 1,
                    'name' => 'アヌエアネ',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:34:06',
                    'updated_at' => '2019-04-16 18:55:16',
                ),
                102 =>
                array (
                    'id' => 103,
                    'user_id' => 1,
                    'name' => '粥屋',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:34:15',
                    'updated_at' => '2019-04-16 18:55:24',
                ),
                103 =>
                array (
                    'id' => 104,
                    'user_id' => 1,
                'name' => '蓮(ＲＥＮ)',
                    'status' => 3,
                    'created_at' => '2019-04-16 15:34:25',
                    'updated_at' => '2019-04-16 15:40:22',
                ),
                104 =>
                array (
                    'id' => 105,
                    'user_id' => 1,
                    'name' => 'ハッピーハニークレープ',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:34:34',
                    'updated_at' => '2019-04-16 18:31:19',
                ),
                105 =>
                array (
                    'id' => 106,
                    'user_id' => 1,
                    'name' => '給食当番104号車',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:34:45',
                    'updated_at' => '2019-04-16 18:31:28',
                ),
                106 =>
                array (
                    'id' => 107,
                    'user_id' => 1,
                    'name' => 'mix\'n mixream',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:34:57',
                    'updated_at' => '2019-04-16 18:31:36',
                ),
                107 =>
                array (
                    'id' => 108,
                    'user_id' => 1,
                    'name' => 'チャーシューメンドッグ',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:35:10',
                    'updated_at' => '2019-04-16 18:31:43',
                ),
                108 =>
                array (
                    'id' => 109,
                    'user_id' => 1,
                    'name' => 'Magical',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:35:18',
                    'updated_at' => '2019-04-16 18:31:51',
                ),
                109 =>
                array (
                    'id' => 110,
                    'user_id' => 1,
                    'name' => '弁天流',
                    'status' => 3,
                    'created_at' => '2019-04-16 15:35:28',
                    'updated_at' => '2019-04-16 15:39:58',
                ),
                110 =>
                array (
                    'id' => 111,
                    'user_id' => 1,
                    'name' => 'aile(エル)',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:35:37',
                    'updated_at' => '2019-04-16 18:56:31',
                ),
                111 =>
                array (
                    'id' => 112,
                    'user_id' => 1,
                    'name' => 'パリスキャバブ',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:35:46',
                    'updated_at' => '2019-04-16 18:56:39',
                ),
                112 =>
                array (
                    'id' => 113,
                    'user_id' => 1,
                    'name' => 'クレープパンケーキ',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:35:55',
                    'updated_at' => '2019-04-16 18:31:09',
                ),
                113 =>
                array (
                    'id' => 114,
                    'user_id' => 1,
                    'name' => 'RANCHIKI',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:36:04',
                    'updated_at' => '2019-04-16 18:31:01',
                ),
                114 =>
                array (
                    'id' => 115,
                    'user_id' => 1,
                    'name' => 'Maruma yakiimo',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:36:14',
                    'updated_at' => '2019-04-16 18:56:18',
                ),
                115 =>
                array (
                    'id' => 116,
                    'user_id' => 1,
                    'name' => 'ドネル・タイム',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:36:25',
                    'updated_at' => '2019-04-16 18:30:23',
                ),
                116 =>
                array (
                    'id' => 117,
                    'user_id' => 1,
                    'name' => 'サワディー',
                    'status' => 3,
                    'created_at' => '2019-04-16 15:36:34',
                    'updated_at' => '2019-04-16 18:58:52',
                ),
                117 =>
                array (
                    'id' => 118,
                    'user_id' => 1,
                    'name' => 'タイカレーPAOPAO',
                    'status' => 7,
                    'created_at' => '2019-04-16 15:36:43',
                    'updated_at' => '2019-04-16 18:30:31',
                ),
                118 =>
                array (
                    'id' => 119,
                    'user_id' => 1,
                    'name' => 'biji（ビジ）',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:36:53',
                    'updated_at' => '2019-04-16 18:30:40',
                ),
                119 =>
                array (
                    'id' => 120,
                    'user_id' => 1,
                    'name' => 'ドネルハウス',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:37:03',
                    'updated_at' => '2019-04-16 18:30:49',
                ),
                120 =>
                array (
                    'id' => 121,
                    'user_id' => 1,
                    'name' => 'ALLA’S HOUSE',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:37:41',
                    'updated_at' => '2019-04-16 18:56:03',
                ),
                121 =>
                array (
                    'id' => 122,
                    'user_id' => 1,
                    'name' => 'ファンキーズ',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:37:52',
                    'updated_at' => '2019-04-16 18:30:11',
                ),
                122 =>
                array (
                    'id' => 123,
                    'user_id' => 1,
                    'name' => 'Jing Jing Thai SHOKUDO',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:38:01',
                    'updated_at' => '2019-04-16 18:30:04',
                ),
                123 =>
                array (
                    'id' => 124,
                    'user_id' => 1,
                    'name' => 'POPOPEKU',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:38:12',
                    'updated_at' => '2019-04-16 18:29:56',
                ),
                124 =>
                array (
                    'id' => 125,
                    'user_id' => 1,
                    'name' => 'なぁ～じゅ',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:38:21',
                    'updated_at' => '2019-04-16 18:29:44',
                ),
                125 =>
                array (
                    'id' => 126,
                    'user_id' => 1,
                    'name' => 'SANTY',
                    'status' => 7,
                    'created_at' => '2019-04-16 15:38:31',
                    'updated_at' => '2019-04-16 16:23:04',
                ),
                126 =>
                array (
                    'id' => 127,
                    'user_id' => 1,
                    'name' => 'ON THE DISH',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:38:40',
                    'updated_at' => '2019-04-16 16:22:52',
                ),
                127 =>
                array (
                    'id' => 128,
                    'user_id' => 1,
                    'name' => 'むランチ',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:38:50',
                    'updated_at' => '2019-04-16 16:22:44',
                ),
                128 =>
                array (
                    'id' => 129,
                    'user_id' => 1,
                    'name' => 'らくだキッチン',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:39:00',
                    'updated_at' => '2019-04-16 15:51:36',
                ),
                129 =>
                array (
                    'id' => 130,
                    'user_id' => 1,
                    'name' => 'タコムラ屋',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:39:10',
                    'updated_at' => '2019-04-16 15:51:26',
                ),
                130 =>
                array (
                    'id' => 131,
                    'user_id' => 1,
                    'name' => 'ペルシアダマバンド',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:39:20',
                    'updated_at' => '2019-04-16 15:51:16',
                ),
                131 =>
                array (
                    'id' => 132,
                    'user_id' => 1,
                    'name' => '一誠堂',
                    'status' => 3,
                    'created_at' => '2019-04-16 15:39:29',
                    'updated_at' => '2019-04-16 15:39:41',
                ),
                132 =>
                array (
                    'id' => 133,
                    'user_id' => 1,
                    'name' => 'Balducci',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:06:25',
                    'updated_at' => '2019-04-16 18:03:39',
                ),
                133 =>
                array (
                    'id' => 134,
                    'user_id' => 1,
                    'name' => 'マレーチャン',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:06:34',
                    'updated_at' => '2019-04-16 18:03:50',
                ),
                134 =>
                array (
                    'id' => 135,
                    'user_id' => 1,
                    'name' => 'kitchen eno',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:06:44',
                    'updated_at' => '2019-04-16 18:03:58',
                ),
                135 =>
                array (
                    'id' => 136,
                    'user_id' => 1,
                    'name' => 'ネイサンズ',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:06:54',
                    'updated_at' => '2019-04-16 18:04:06',
                ),
                136 =>
                array (
                    'id' => 137,
                    'user_id' => 1,
                    'name' => 'スパゲティ・ぺこりーの',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:07:05',
                    'updated_at' => '2019-04-16 18:04:15',
                ),
                137 =>
                array (
                    'id' => 138,
                    'user_id' => 1,
                    'name' => '塚越ラーメン',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:07:19',
                    'updated_at' => '2019-04-16 18:04:23',
                ),
                138 =>
                array (
                    'id' => 139,
                    'user_id' => 1,
                    'name' => 'ナルモンタイ',
                    'status' => 3,
                    'created_at' => '2019-04-16 17:07:29',
                    'updated_at' => '2019-04-16 17:09:20',
                ),
                139 =>
                array (
                    'id' => 140,
                    'user_id' => 1,
                    'name' => 'NAZ',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:07:40',
                    'updated_at' => '2019-04-16 17:19:39',
                ),
                140 =>
                array (
                    'id' => 141,
                    'user_id' => 1,
                    'name' => 'deliwagon roman-tei',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:07:50',
                    'updated_at' => '2019-04-16 17:19:30',
                ),
                141 =>
                array (
                    'id' => 142,
                    'user_id' => 1,
                    'name' => 'ばくだん亭',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:08:01',
                    'updated_at' => '2019-04-16 17:19:22',
                ),
                142 =>
                array (
                    'id' => 143,
                    'user_id' => 1,
                    'name' => 'カハラハウス',
                    'status' => 3,
                    'created_at' => '2019-04-16 17:08:10',
                    'updated_at' => '2019-04-16 17:09:51',
                ),
                143 =>
                array (
                    'id' => 144,
                    'user_id' => 1,
                    'name' => 'SPOON',
                    'status' => 8,
                    'created_at' => '2019-04-16 17:08:21',
                    'updated_at' => '2019-04-16 17:19:12',
                ),
                144 =>
                array (
                    'id' => 145,
                    'user_id' => 1,
                    'name' => 'TACO★CHOICE（ル・キャミオン）',
                    'status' => 3,
                    'created_at' => '2019-04-16 17:08:53',
                    'updated_at' => '2019-04-16 17:09:33',
                ),
                145 =>
                array (
                    'id' => 146,
                    'user_id' => 1,
                    'name' => 'Ｓｗｅｅｔ　Ｐｉｎｏｃｃｈｉｏ',
                    'status' => 8,
                    'created_at' => '2019-04-16 18:29:28',
                    'updated_at' => '2019-04-16 18:29:33',
                ),
            ));


    }
}

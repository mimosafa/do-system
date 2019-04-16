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
            18 => 
            array (
                'id' => 19,
                'name' => '大上海',
                'status' => 9,
                'created_at' => '2019-04-16 11:04:46',
                'updated_at' => '2019-04-16 14:49:08',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'メーアン',
                'status' => 9,
                'created_at' => '2019-04-16 11:04:58',
                'updated_at' => '2019-04-16 15:15:15',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Ｔｏｎｇｕｅ　Ｔａｂｌｅ',
                'status' => 9,
                'created_at' => '2019-04-16 11:05:13',
                'updated_at' => '2019-04-16 15:17:12',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'クレイジータコス',
                'status' => 8,
                'created_at' => '2019-04-16 11:05:22',
                'updated_at' => '2019-04-16 15:17:22',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'デリデミーナ',
                'status' => 9,
                'created_at' => '2019-04-16 11:05:33',
                'updated_at' => '2019-04-16 15:17:31',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Ｅｇｇ　Ｒａｉｎｂｏｗ',
                'status' => 1,
                'created_at' => '2019-04-16 11:05:43',
                'updated_at' => '2019-04-16 11:20:08',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => '給食当番6号車',
                'status' => 9,
                'created_at' => '2019-04-16 11:05:51',
                'updated_at' => '2019-04-16 15:17:42',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'サウスパーク',
                'status' => 1,
                'created_at' => '2019-04-16 11:06:00',
                'updated_at' => '2019-04-16 11:09:31',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'パパガヤデリ',
                'status' => 1,
                'created_at' => '2019-04-16 11:06:08',
                'updated_at' => '2019-04-16 11:09:42',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'ＡＦＲＯ－ＢＵＲＧＥＲ',
                'status' => 9,
                'created_at' => '2019-04-16 11:06:18',
                'updated_at' => '2019-04-16 15:49:48',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Ｒｙｕｋｙｕ　Ｗａｖｅ',
                'status' => 9,
                'created_at' => '2019-04-16 11:06:27',
                'updated_at' => '2019-04-16 15:49:58',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'ＲＵＮＴＡ',
                'status' => 9,
                'created_at' => '2019-04-16 11:06:36',
                'updated_at' => '2019-04-16 15:50:08',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'ｒｕｅ　ＣｈａｔｏｎＳ',
                'status' => 9,
                'created_at' => '2019-04-16 11:06:46',
                'updated_at' => '2019-04-16 15:50:17',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => '元祖　横浜カレーパン',
                'status' => 8,
                'created_at' => '2019-04-16 11:06:54',
                'updated_at' => '2019-04-16 15:50:28',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'あいうえお',
                'status' => 9,
                'created_at' => '2019-04-16 11:07:02',
                'updated_at' => '2019-04-16 15:51:51',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'カリー・カリー',
                'status' => 8,
                'created_at' => '2019-04-16 11:07:12',
                'updated_at' => '2019-04-16 15:51:59',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'インディ',
                'status' => 9,
                'created_at' => '2019-04-16 11:07:23',
                'updated_at' => '2019-04-16 15:52:08',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'ロコロール',
                'status' => 9,
                'created_at' => '2019-04-16 11:07:32',
                'updated_at' => '2019-04-16 15:52:18',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'ヴァジアーナ・セブン',
                'status' => 9,
                'created_at' => '2019-04-16 11:07:40',
                'updated_at' => '2019-04-16 15:52:47',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'アカシヤ',
                'status' => 9,
                'created_at' => '2019-04-16 11:07:50',
                'updated_at' => '2019-04-16 15:54:53',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'クアトロおじさん',
                'status' => 9,
                'created_at' => '2019-04-16 11:08:00',
                'updated_at' => '2019-04-16 15:55:01',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'ニューヨークパスタ',
                'status' => 9,
                'created_at' => '2019-04-16 11:08:10',
                'updated_at' => '2019-04-16 15:55:14',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'バン・ギャオ',
                'status' => 1,
                'created_at' => '2019-04-16 11:08:19',
                'updated_at' => '2019-04-16 11:20:26',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'yummy-E',
                'status' => 1,
                'created_at' => '2019-04-16 11:08:35',
                'updated_at' => '2019-04-16 11:10:02',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => '煌（ファン）',
                'status' => 9,
                'created_at' => '2019-04-16 11:08:45',
                'updated_at' => '2019-04-16 15:55:33',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'モトヤエクスプレス',
                'status' => 9,
                'created_at' => '2019-04-16 11:08:54',
                'updated_at' => '2019-04-16 15:55:42',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'クッキーメロンパン',
                'status' => 9,
                'created_at' => '2019-04-16 11:09:03',
                'updated_at' => '2019-04-16 15:55:50',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'VEGE TIME',
                'status' => 9,
                'created_at' => '2019-04-16 11:09:13',
                'updated_at' => '2019-04-16 15:55:59',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => '和食 しの',
                'status' => 1,
                'created_at' => '2019-04-16 11:10:36',
                'updated_at' => '2019-04-16 11:11:45',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'ＭＡＤＯ',
                'status' => 9,
                'created_at' => '2019-04-16 11:10:47',
                'updated_at' => '2019-04-16 17:19:55',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'jungle Foods',
                'status' => 8,
                'created_at' => '2019-04-16 11:10:57',
                'updated_at' => '2019-04-16 17:20:03',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'アフラテッロ　アレックス',
                'status' => 9,
                'created_at' => '2019-04-16 11:11:06',
                'updated_at' => '2019-04-16 17:20:11',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'LUCIE BUS',
                'status' => 9,
                'created_at' => '2019-04-16 11:11:15',
                'updated_at' => '2019-04-16 17:20:21',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'OmtRak',
                'status' => 1,
                'created_at' => '2019-04-16 11:11:23',
                'updated_at' => '2019-04-16 11:11:56',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'デリキムチ',
                'status' => 1,
                'created_at' => '2019-04-16 11:11:33',
                'updated_at' => '2019-04-16 11:12:06',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'ソフラカ',
                'status' => 9,
                'created_at' => '2019-04-16 11:12:42',
                'updated_at' => '2019-04-16 17:57:01',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'FLOW CAFÉ',
                'status' => 9,
                'created_at' => '2019-04-16 11:12:51',
                'updated_at' => '2019-04-16 17:58:03',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => '08 Café',
                'status' => 9,
                'created_at' => '2019-04-16 11:13:00',
                'updated_at' => '2019-04-16 17:58:10',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'ambulante café',
                'status' => 9,
                'created_at' => '2019-04-16 11:13:10',
                'updated_at' => '2019-04-16 17:58:19',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'SWEET VENOM',
                'status' => 9,
                'created_at' => '2019-04-16 11:13:19',
                'updated_at' => '2019-04-16 17:58:27',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'たこさん',
                'status' => 1,
                'created_at' => '2019-04-16 11:13:27',
                'updated_at' => '2019-04-16 11:20:41',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'TSUGUMI',
                'status' => 9,
                'created_at' => '2019-04-16 11:13:35',
                'updated_at' => '2019-04-16 18:02:20',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => '象の耳',
                'status' => 9,
                'created_at' => '2019-04-16 11:13:44',
                'updated_at' => '2019-04-16 18:02:30',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'KUNA（空海）',
                'status' => 9,
                'created_at' => '2019-04-16 11:13:52',
                'updated_at' => '2019-04-16 18:02:37',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'バブス',
                'status' => 8,
                'created_at' => '2019-04-16 11:14:01',
                'updated_at' => '2019-04-16 15:50:44',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'ランチQ',
                'status' => 9,
                'created_at' => '2019-04-16 11:14:10',
                'updated_at' => '2019-04-16 18:02:46',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => '大月珈琲店',
                'status' => 9,
                'created_at' => '2019-04-16 11:14:18',
                'updated_at' => '2019-04-16 18:02:53',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'スターケバブ',
                'status' => 9,
                'created_at' => '2019-04-16 11:14:28',
                'updated_at' => '2019-04-16 18:03:03',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'ギズモカフェ',
                'status' => 9,
                'created_at' => '2019-04-16 11:14:36',
                'updated_at' => '2019-04-16 18:03:11',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'ワンダーデッシュ',
                'status' => 1,
                'created_at' => '2019-04-16 11:14:44',
                'updated_at' => '2019-04-16 11:20:53',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'ラクシュミー',
                'status' => 9,
                'created_at' => '2019-04-16 11:14:52',
                'updated_at' => '2019-04-16 18:32:04',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'ゴーゴーカレー',
                'status' => 9,
                'created_at' => '2019-04-16 11:15:03',
                'updated_at' => '2019-04-16 18:32:11',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Yummy Yummy',
                'status' => 9,
                'created_at' => '2019-04-16 11:15:12',
                'updated_at' => '2019-04-16 18:32:17',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'サンシャインカフェ',
                'status' => 9,
                'created_at' => '2019-04-16 11:15:20',
                'updated_at' => '2019-04-16 18:32:24',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'ミラーン',
                'status' => 1,
                'created_at' => '2019-04-16 11:15:29',
                'updated_at' => '2019-04-16 11:21:04',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'カシミールカレー',
                'status' => 9,
                'created_at' => '2019-04-16 11:15:38',
                'updated_at' => '2019-04-16 17:20:49',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'またたび屋',
                'status' => 9,
                'created_at' => '2019-04-16 11:15:46',
                'updated_at' => '2019-04-16 17:20:57',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'マルシェ',
                'status' => 1,
                'created_at' => '2019-04-16 11:15:54',
                'updated_at' => '2019-04-16 11:21:21',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Assorti(アソルティ）',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:16:03',
                    'updated_at' => '2019-04-16 18:54:28',
                ),
                77 => 
                array (
                    'id' => 78,
                    'name' => 'メロンちゃんのメロンパン',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:16:13',
                    'updated_at' => '2019-04-16 18:58:06',
                ),
                78 => 
                array (
                    'id' => 79,
                    'name' => '給食当番123号',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:16:21',
                    'updated_at' => '2019-04-16 18:58:13',
                ),
                79 => 
                array (
                    'id' => 80,
                    'name' => 'Ｒ511',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:16:31',
                    'updated_at' => '2019-04-16 18:54:36',
                ),
                80 => 
                array (
                    'id' => 81,
                    'name' => 'TUB CAT',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:16:39',
                    'updated_at' => '2019-04-16 18:55:32',
                ),
                81 => 
                array (
                    'id' => 82,
                    'name' => 'HappyOrange',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:16:48',
                    'updated_at' => '2019-04-16 18:58:21',
                ),
                82 => 
                array (
                    'id' => 83,
                    'name' => 'マツゲン',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:16:57',
                    'updated_at' => '2019-04-16 18:58:31',
                ),
                83 => 
                array (
                    'id' => 84,
                    'name' => 'Dudes',
                    'status' => 1,
                    'created_at' => '2019-04-16 11:17:08',
                    'updated_at' => '2019-04-16 11:21:34',
                ),
                84 => 
                array (
                    'id' => 85,
                    'name' => 'Retoro\'n Box',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:17:17',
                    'updated_at' => '2019-04-16 17:58:44',
                ),
                85 => 
                array (
                    'id' => 86,
                    'name' => 'Kitchen Curry香房',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:17:25',
                    'updated_at' => '2019-04-16 17:58:52',
                ),
                86 => 
                array (
                    'id' => 87,
                    'name' => 'SPIRAL DRIFTER CAFÉ',
                    'status' => 1,
                    'created_at' => '2019-04-16 11:17:37',
                    'updated_at' => '2019-04-16 11:21:54',
                ),
                87 => 
                array (
                    'id' => 88,
                    'name' => 'ジャランジャラン',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:17:46',
                    'updated_at' => '2019-04-16 18:56:55',
                ),
                88 => 
                array (
                    'id' => 89,
                    'name' => 'グレンツェン',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:17:54',
                    'updated_at' => '2019-04-16 18:57:04',
                ),
                89 => 
                array (
                    'id' => 90,
                    'name' => 'GRIFFIN',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:18:03',
                    'updated_at' => '2019-04-16 18:55:41',
                ),
                90 => 
                array (
                    'id' => 91,
                    'name' => '白猫堂',
                    'status' => 1,
                    'created_at' => '2019-04-16 11:18:12',
                    'updated_at' => '2019-04-16 18:58:42',
                ),
                91 => 
                array (
                    'id' => 92,
                    'name' => 'ジャミング',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:18:22',
                    'updated_at' => '2019-04-16 18:54:57',
                ),
                92 => 
                array (
                    'id' => 93,
                    'name' => 'micro-café',
                    'status' => 8,
                    'created_at' => '2019-04-16 11:18:36',
                    'updated_at' => '2019-04-16 18:54:46',
                ),
                93 => 
                array (
                    'id' => 94,
                    'name' => 'おこクレ亭',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:18:44',
                    'updated_at' => '2019-04-16 18:57:14',
                ),
                94 => 
                array (
                    'id' => 95,
                    'name' => 'たんぽや',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:18:53',
                    'updated_at' => '2019-04-16 18:57:21',
                ),
                95 => 
                array (
                    'id' => 96,
                    'name' => 'ミート屋本舗',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:19:02',
                    'updated_at' => '2019-04-16 15:16:57',
                ),
                96 => 
                array (
                    'id' => 97,
                    'name' => 'NAP JAPAN',
                    'status' => 1,
                    'created_at' => '2019-04-16 11:19:12',
                    'updated_at' => '2019-04-16 11:22:09',
                ),
                97 => 
                array (
                    'id' => 98,
                    'name' => 'カフェ　アローマ',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:19:20',
                    'updated_at' => '2019-04-16 15:16:42',
                ),
                98 => 
                array (
                    'id' => 99,
                    'name' => 'MANMA隊',
                    'status' => 9,
                    'created_at' => '2019-04-16 11:19:29',
                    'updated_at' => '2019-04-16 15:16:30',
                ),
                99 => 
                array (
                    'id' => 100,
                    'name' => 'Julie\'s spices',
                    'status' => 1,
                    'created_at' => '2019-04-16 11:19:37',
                    'updated_at' => '2019-04-16 11:22:19',
                ),
                100 => 
                array (
                    'id' => 101,
                    'name' => 'ボーノボーノ',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:33:56',
                    'updated_at' => '2019-04-16 18:55:08',
                ),
                101 => 
                array (
                    'id' => 102,
                    'name' => 'アヌエアネ',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:34:06',
                    'updated_at' => '2019-04-16 18:55:16',
                ),
                102 => 
                array (
                    'id' => 103,
                    'name' => '粥屋',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:34:15',
                    'updated_at' => '2019-04-16 18:55:24',
                ),
                103 => 
                array (
                    'id' => 104,
                'name' => '蓮(ＲＥＮ)',
                    'status' => 1,
                    'created_at' => '2019-04-16 15:34:25',
                    'updated_at' => '2019-04-16 15:40:22',
                ),
                104 => 
                array (
                    'id' => 105,
                    'name' => 'ハッピーハニークレープ',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:34:34',
                    'updated_at' => '2019-04-16 18:31:19',
                ),
                105 => 
                array (
                    'id' => 106,
                    'name' => '給食当番104号車',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:34:45',
                    'updated_at' => '2019-04-16 18:31:28',
                ),
                106 => 
                array (
                    'id' => 107,
                    'name' => 'mix\'n mixream',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:34:57',
                    'updated_at' => '2019-04-16 18:31:36',
                ),
                107 => 
                array (
                    'id' => 108,
                    'name' => 'チャーシューメンドッグ',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:35:10',
                    'updated_at' => '2019-04-16 18:31:43',
                ),
                108 => 
                array (
                    'id' => 109,
                    'name' => 'Magical',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:35:18',
                    'updated_at' => '2019-04-16 18:31:51',
                ),
                109 => 
                array (
                    'id' => 110,
                    'name' => '弁天流',
                    'status' => 1,
                    'created_at' => '2019-04-16 15:35:28',
                    'updated_at' => '2019-04-16 15:39:58',
                ),
                110 => 
                array (
                    'id' => 111,
                'name' => 'aile(エル)',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:35:37',
                    'updated_at' => '2019-04-16 18:56:31',
                ),
                111 => 
                array (
                    'id' => 112,
                    'name' => 'パリスキャバブ',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:35:46',
                    'updated_at' => '2019-04-16 18:56:39',
                ),
                112 => 
                array (
                    'id' => 113,
                    'name' => 'クレープパンケーキ',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:35:55',
                    'updated_at' => '2019-04-16 18:31:09',
                ),
                113 => 
                array (
                    'id' => 114,
                    'name' => 'RANCHIKI',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:36:04',
                    'updated_at' => '2019-04-16 18:31:01',
                ),
                114 => 
                array (
                    'id' => 115,
                    'name' => 'Maruma yakiimo',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:36:14',
                    'updated_at' => '2019-04-16 18:56:18',
                ),
                115 => 
                array (
                    'id' => 116,
                    'name' => 'ドネル・タイム',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:36:25',
                    'updated_at' => '2019-04-16 18:30:23',
                ),
                116 => 
                array (
                    'id' => 117,
                    'name' => 'サワディー',
                    'status' => 1,
                    'created_at' => '2019-04-16 15:36:34',
                    'updated_at' => '2019-04-16 18:58:52',
                ),
                117 => 
                array (
                    'id' => 118,
                    'name' => 'タイカレーPAOPAO',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:36:43',
                    'updated_at' => '2019-04-16 18:30:31',
                ),
                118 => 
                array (
                    'id' => 119,
                    'name' => 'biji（ビジ）',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:36:53',
                    'updated_at' => '2019-04-16 18:30:40',
                ),
                119 => 
                array (
                    'id' => 120,
                    'name' => 'ドネルハウス',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:37:03',
                    'updated_at' => '2019-04-16 18:30:49',
                ),
                120 => 
                array (
                    'id' => 121,
                    'name' => 'ALLA’S HOUSE',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:37:41',
                    'updated_at' => '2019-04-16 18:56:03',
                ),
                121 => 
                array (
                    'id' => 122,
                    'name' => 'ファンキーズ',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:37:52',
                    'updated_at' => '2019-04-16 18:30:11',
                ),
                122 => 
                array (
                    'id' => 123,
                    'name' => 'Jing Jing Thai SHOKUDO',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:38:01',
                    'updated_at' => '2019-04-16 18:30:04',
                ),
                123 => 
                array (
                    'id' => 124,
                    'name' => 'POPOPEKU',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:38:12',
                    'updated_at' => '2019-04-16 18:29:56',
                ),
                124 => 
                array (
                    'id' => 125,
                    'name' => 'なぁ～じゅ',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:38:21',
                    'updated_at' => '2019-04-16 18:29:44',
                ),
                125 => 
                array (
                    'id' => 126,
                    'name' => 'SANTY',
                    'status' => 8,
                    'created_at' => '2019-04-16 15:38:31',
                    'updated_at' => '2019-04-16 16:23:04',
                ),
                126 => 
                array (
                    'id' => 127,
                    'name' => 'ON THE DISH',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:38:40',
                    'updated_at' => '2019-04-16 16:22:52',
                ),
                127 => 
                array (
                    'id' => 128,
                    'name' => 'むランチ',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:38:50',
                    'updated_at' => '2019-04-16 16:22:44',
                ),
                128 => 
                array (
                    'id' => 129,
                    'name' => 'らくだキッチン',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:39:00',
                    'updated_at' => '2019-04-16 15:51:36',
                ),
                129 => 
                array (
                    'id' => 130,
                    'name' => 'タコムラ屋',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:39:10',
                    'updated_at' => '2019-04-16 15:51:26',
                ),
                130 => 
                array (
                    'id' => 131,
                    'name' => 'ペルシアダマバンド',
                    'status' => 9,
                    'created_at' => '2019-04-16 15:39:20',
                    'updated_at' => '2019-04-16 15:51:16',
                ),
                131 => 
                array (
                    'id' => 132,
                    'name' => '一誠堂',
                    'status' => 1,
                    'created_at' => '2019-04-16 15:39:29',
                    'updated_at' => '2019-04-16 15:39:41',
                ),
                132 => 
                array (
                    'id' => 133,
                    'name' => 'Balducci',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:06:25',
                    'updated_at' => '2019-04-16 18:03:39',
                ),
                133 => 
                array (
                    'id' => 134,
                    'name' => 'マレーチャン',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:06:34',
                    'updated_at' => '2019-04-16 18:03:50',
                ),
                134 => 
                array (
                    'id' => 135,
                    'name' => 'kitchen eno',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:06:44',
                    'updated_at' => '2019-04-16 18:03:58',
                ),
                135 => 
                array (
                    'id' => 136,
                    'name' => 'ネイサンズ',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:06:54',
                    'updated_at' => '2019-04-16 18:04:06',
                ),
                136 => 
                array (
                    'id' => 137,
                    'name' => 'スパゲティ・ぺこりーの',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:07:05',
                    'updated_at' => '2019-04-16 18:04:15',
                ),
                137 => 
                array (
                    'id' => 138,
                    'name' => '塚越ラーメン',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:07:19',
                    'updated_at' => '2019-04-16 18:04:23',
                ),
                138 => 
                array (
                    'id' => 139,
                    'name' => 'ナルモンタイ',
                    'status' => 1,
                    'created_at' => '2019-04-16 17:07:29',
                    'updated_at' => '2019-04-16 17:09:20',
                ),
                139 => 
                array (
                    'id' => 140,
                    'name' => 'NAZ',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:07:40',
                    'updated_at' => '2019-04-16 17:19:39',
                ),
                140 => 
                array (
                    'id' => 141,
                    'name' => 'deliwagon roman-tei',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:07:50',
                    'updated_at' => '2019-04-16 17:19:30',
                ),
                141 => 
                array (
                    'id' => 142,
                    'name' => 'ばくだん亭',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:08:01',
                    'updated_at' => '2019-04-16 17:19:22',
                ),
                142 => 
                array (
                    'id' => 143,
                    'name' => 'カハラハウス',
                    'status' => 1,
                    'created_at' => '2019-04-16 17:08:10',
                    'updated_at' => '2019-04-16 17:09:51',
                ),
                143 => 
                array (
                    'id' => 144,
                    'name' => 'SPOON',
                    'status' => 9,
                    'created_at' => '2019-04-16 17:08:21',
                    'updated_at' => '2019-04-16 17:19:12',
                ),
                144 => 
                array (
                    'id' => 145,
                    'name' => 'TACO★CHOICE（ル・キャミオン）',
                    'status' => 1,
                    'created_at' => '2019-04-16 17:08:53',
                    'updated_at' => '2019-04-16 17:09:33',
                ),
                145 => 
                array (
                    'id' => 146,
                    'name' => 'Ｓｗｅｅｔ　Ｐｉｎｏｃｃｈｉｏ',
                    'status' => 9,
                    'created_at' => '2019-04-16 18:29:28',
                    'updated_at' => '2019-04-16 18:29:33',
                ),
            ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class AdvertisementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('advertisements')->delete();
        
        \DB::table('advertisements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 1,
                'title_primary' => NULL,
                'title_secondary' => 'ご存知、ネオ屋台村村長のお店。',
                'description_primary' => 'ご存知、ネオ屋台村村長のお店。屋台メニューの王道が盛りだくさん。',
                'description_secondary' => NULL,
                'content_primary' => NULL,
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-12 20:11:41',
                'updated_at' => '2019-04-12 20:12:18',
            ),
            1 => 
            array (
                'id' => 2,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 2,
                'title_primary' => NULL,
                'title_secondary' => 'ガッ！と一気に食べたくなる美味しさ',
                'description_primary' => '塩だれ本ぽは、お腹大満足、ボリューム満点の豚トロがイチオシ！',
                'description_secondary' => NULL,
                'content_primary' => 'がっつり系を食べたい時、有力候補に入るのが丼もの。中でも、塩だれ本ぽは、お腹大満足、ボリューム満点の豚トロがイチオシ！　男子フジロッカーにうれしい大盛り無料サービスも。もちろん、女子も遠慮なく注文しちゃいましょう。',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-12 20:11:52',
                'updated_at' => '2019-04-19 20:40:30',
            ),
            2 => 
            array (
                'id' => 3,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 3,
                'title_primary' => NULL,
                'title_secondary' => '焼き立てです！',
                'description_primary' => 'グルグル目の前で回るロティサリーマシンで作る、ローストチキン。「焼き立てです！',
                'description_secondary' => NULL,
                'content_primary' => NULL,
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-12 20:12:44',
                'updated_at' => '2019-04-12 20:12:49',
            ),
            3 => 
            array (
                'id' => 4,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 4,
                'title_primary' => NULL,
                'title_secondary' => '手作りヘルシー志向の本格的南インドカレー',
                'description_primary' => 'マサラチキン、イカカレー、スパイシーポーク、ココナッツチキン など週替りでお届け',
                'description_secondary' => NULL,
                'content_primary' => '手作り・ヘルシー志向の本格的南インドカレー。 マサラチキン、イカカレー、スパイシーポーク、ココナッツチキン など週替わりでお届けします。ベジタリアンメニューのご用意も。',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-18 17:58:26',
                'updated_at' => '2019-04-18 17:58:26',
            ),
            4 => 
            array (
                'id' => 5,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 5,
                'title_primary' => NULL,
                'title_secondary' => '頑固おやじが作る旬菜ヘルシー和食のお弁当',
                'description_primary' => '頑固おやじが作る旬菜ヘルシー和食のお弁当をどうぞ。',
                'description_secondary' => NULL,
                'content_primary' => NULL,
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-18 18:02:03',
                'updated_at' => '2019-04-18 18:02:03',
            ),
            5 => 
            array (
                'id' => 6,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 6,
                'title_primary' => NULL,
                'title_secondary' => '自家焙煎珈琲 移動販売',
                'description_primary' => '挽きたて淹れたての様々なアレンジコーヒーをお出しします。',
                'description_secondary' => NULL,
                'content_primary' => 'イタリア製の本格エスプレッソマシーン“LA-CIMBALI”を使用し、挽きたて淹れたての様々なアレンジコーヒーをお出しします。',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-18 20:40:38',
                'updated_at' => '2019-04-18 20:40:38',
            ),
            6 => 
            array (
                'id' => 7,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 7,
                'title_primary' => NULL,
                'title_secondary' => '注文のあと目の前でカットします！',
                'description_primary' => '出来たてローストビーフ、注文のあと目の前でカットします！',
                'description_secondary' => NULL,
                'content_primary' => '出来たてローストビーフ、注文のあと目の前でカットします！とってもジューシー。クセになるスパイスのグリルチキンも！お勧めはダブルセットです。',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-18 20:45:00',
                'updated_at' => '2019-04-18 20:45:00',
            ),
            7 => 
            array (
                'id' => 8,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 8,
                'title_primary' => NULL,
                'title_secondary' => 'ハワイ大好き女店主が作るハワイ料理！',
                'description_primary' => 'ハワイ大好き・波乗り大好きな女店主が作る手作りハンバーグのハワイ料理！！',
                'description_secondary' => NULL,
                'content_primary' => 'ハワイ大好き・波乗り大好きな女店主が作る手作りハンバーグのハワイ料理！！オリジナルソースのクリーミートマトは、他では味わえないロコモコ！さっぱりトマトにクリーミーなまろやかさが加わり癖になる味。ジューシーな手作りハンバーグと相性ばっちり！',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-19 21:05:33',
                'updated_at' => '2019-04-22 10:27:37',
            ),
            8 => 
            array (
                'id' => 9,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 9,
                'title_primary' => NULL,
                'title_secondary' => 'ワクワクするランチタイムを',
                'description_primary' => '東京バランスランチでもっとワクワクするランチタイムを',
                'description_secondary' => NULL,
                'content_primary' => '自由に選べる「世界のおかず」4品＆栄養満点「特製スープ」で確かな満足感。東京バランスランチでもっとワクワクするランチタイムを。',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-19 21:07:06',
                'updated_at' => '2019-04-19 21:07:06',
            ),
            9 => 
            array (
                'id' => 10,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 10,
                'title_primary' => NULL,
                'title_secondary' => '一度食べたらクセになりますよー',
                'description_primary' => NULL,
                'description_secondary' => NULL,
                'content_primary' => 'ジュリーズスパイスが紹介するナシゴレンやオリジナル甘辛丼です。一度食べたらクセになりますよー。',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-19 21:10:44',
                'updated_at' => '2019-04-19 21:10:44',
            ),
            10 => 
            array (
                'id' => 11,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 11,
                'title_primary' => NULL,
                'title_secondary' => '秋田県横手市の名物「横手やきそば」',
                'description_primary' => 'だし汁とソースを合わせたタレを使い、目玉焼きが上に乗ります。',
                'description_secondary' => NULL,
                'content_primary' => '秋田県横手市の名物「横手やきそば」！！だし汁とソースを合わせたタレを使い、目玉焼きが上に乗ります。',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-23 15:50:45',
                'updated_at' => '2019-04-23 15:50:45',
            ),
            11 => 
            array (
                'id' => 12,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 12,
                'title_primary' => NULL,
                'title_secondary' => NULL,
                'description_primary' => 'アンガス牛を使ったボリュームたっぷりのビーフステーキ',
                'description_secondary' => NULL,
                'content_primary' => NULL,
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-23 18:27:48',
                'updated_at' => '2019-04-23 18:27:48',
            ),
            12 => 
            array (
                'id' => 13,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 13,
                'title_primary' => NULL,
                'title_secondary' => '体にやさしい料理',
                'description_primary' => NULL,
                'description_secondary' => NULL,
                'content_primary' => '野いえでは、玄米と季節野菜を中心とした体にやさしい料理をコンセプトに、少しでも皆様の健康のお役に立てればと思い、移動販売をさせていただいております。玄米に関しては、専用圧力鍋を使用して、もっちり感のある食べやすい玄米を召し上がって頂けます。',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-23 18:32:22',
                'updated_at' => '2019-04-23 18:32:22',
            ),
            13 => 
            array (
                'id' => 14,
                'advertisable_type' => 'App\\Shop',
                'advertisable_id' => 14,
                'title_primary' => NULL,
                'title_secondary' => '好きなお惣菜３品が選べる！',
                'description_primary' => '日替わりのお惣菜６種類から、お好きなものを３種類チョイスして下さい。',
                'description_secondary' => NULL,
                'content_primary' => '好きなお惣菜３品が選べる！「”ぶっかけ”でこれとこれとこれ」と店頭に並ぶ毎日日替わりのお惣菜６種類から、お好きなものを３種類チョイスして下さい。',
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-23 18:33:56',
                'updated_at' => '2019-04-23 18:33:56',
            ),
        ));
        
        
    }
}
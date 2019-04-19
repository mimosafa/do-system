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
                'description_primary' => NULL,
                'description_secondary' => NULL,
                'content_primary' => NULL,
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-12 20:11:52',
                'updated_at' => '2019-04-12 20:12:29',
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
        ));
        
        
    }
}
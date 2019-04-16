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
                'advertisable_type' => 'App\\Brand',
                'advertisable_id' => 1,
                'title_primary' => NULL,
                'title_secondary' => 'ご存知、ネオ屋台村村長のお店。',
                'description_primary' => 'ご存知、ネオ屋台村村長のお店。屋台メニューの王道が盛りだくさん。',
                'description_secondary' => '',
                'content_primary' => NULL,
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-12 20:11:41',
                'updated_at' => '2019-04-12 20:12:18',
            ),
            1 => 
            array (
                'id' => 2,
                'advertisable_type' => 'App\\Brand',
                'advertisable_id' => 2,
                'title_primary' => NULL,
                'title_secondary' => 'ガッ！と一気に食べたくなる美味しさ',
                'description_primary' => NULL,
                'description_secondary' => '',
                'content_primary' => NULL,
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-12 20:11:52',
                'updated_at' => '2019-04-12 20:12:29',
            ),
            2 => 
            array (
                'id' => 3,
                'advertisable_type' => 'App\\Brand',
                'advertisable_id' => 3,
                'title_primary' => NULL,
                'title_secondary' => '焼き立てです！',
                'description_primary' => 'グルグル目の前で回るロティサリーマシンで作る、ローストチキン。「焼き立てです！',
                'description_secondary' => '',
                'content_primary' => NULL,
                'content_secondary' => NULL,
                'other_values' => NULL,
                'created_at' => '2019-04-12 20:12:44',
                'updated_at' => '2019-04-12 20:12:49',
            ),
        ));
        
        
    }
}
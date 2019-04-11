<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'vendor_id' => 1,
                'name' => '東京堂',
                'ad_copy' => 'ご存知、ネオ屋台村村長のお店。',
                'ad_text' => 'ご存知、ネオ屋台村村長のお店。屋台メニューの王道が盛りだくさん。',
                'description' => NULL,
                'status' => 0,
                'created_at' => '2019-04-11 16:46:34',
                'updated_at' => '2019-04-11 17:20:21',
            ),
            1 => 
            array (
                'id' => 2,
                'vendor_id' => 1,
                'name' => '塩だれ本舗',
                'ad_copy' => 'ガッ！と一気に食べたくなる美味しさ',
                'ad_text' => NULL,
                'description' => NULL,
                'status' => 0,
                'created_at' => '2019-04-11 16:48:07',
                'updated_at' => '2019-04-11 16:48:07',
            ),
            2 => 
            array (
                'id' => 3,
                'vendor_id' => 4,
                'name' => NULL,
                'ad_copy' => '焼き立てです！',
                'ad_text' => 'グルグル目の前で回るロティサリーマシンで作る、ローストチキン。「焼き立てです！',
                'description' => NULL,
                'status' => 0,
                'created_at' => '2019-04-11 18:10:46',
                'updated_at' => '2019-04-11 18:10:58',
            ),
        ));
        
        
    }
}
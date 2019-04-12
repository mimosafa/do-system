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
                'status' => 0,
                'created_at' => '2019-04-12 20:11:41',
                'updated_at' => '2019-04-12 20:11:41',
            ),
            1 => 
            array (
                'id' => 2,
                'vendor_id' => 1,
                'name' => '塩だれ本舗',
                'status' => 0,
                'created_at' => '2019-04-12 20:11:52',
                'updated_at' => '2019-04-12 20:11:52',
            ),
            2 => 
            array (
                'id' => 3,
                'vendor_id' => 4,
                'name' => NULL,
                'status' => 0,
                'created_at' => '2019-04-12 20:12:44',
                'updated_at' => '2019-04-12 20:12:44',
            ),
        ));
        
        
    }
}
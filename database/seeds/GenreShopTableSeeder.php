<?php

use Illuminate\Database\Seeder;

class GenreShopTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genre_shop')->delete();
        
        \DB::table('genre_shop')->insert(array (
            0 => 
            array (
                'genre_id' => 1,
                'shop_id' => 1,
                'order' => 0,
            ),
            1 => 
            array (
                'genre_id' => 2,
                'shop_id' => 1,
                'order' => 0,
            ),
            2 => 
            array (
                'genre_id' => 3,
                'shop_id' => 4,
                'order' => 0,
            ),
            3 => 
            array (
                'genre_id' => 5,
                'shop_id' => 5,
                'order' => 0,
            ),
            4 => 
            array (
                'genre_id' => 8,
                'shop_id' => 2,
                'order' => 0,
            ),
            5 => 
            array (
                'genre_id' => 8,
                'shop_id' => 7,
                'order' => 0,
            ),
            6 => 
            array (
                'genre_id' => 9,
                'shop_id' => 3,
                'order' => 0,
            ),
            7 => 
            array (
                'genre_id' => 10,
                'shop_id' => 6,
                'order' => 0,
            ),
        ));
        
        
    }
}
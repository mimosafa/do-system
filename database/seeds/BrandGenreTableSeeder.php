<?php

use Illuminate\Database\Seeder;

class BrandGenreTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brand_genre')->delete();
        
        \DB::table('brand_genre')->insert(array (
            0 => 
            array (
                'brand_id' => 1,
                'genre_id' => 1,
            ),
            1 => 
            array (
                'brand_id' => 2,
                'genre_id' => 1,
            ),
            2 => 
            array (
                'brand_id' => 1,
                'genre_id' => 2,
            ),
            3 => 
            array (
                'brand_id' => 1,
                'genre_id' => 5,
            ),
            4 => 
            array (
                'brand_id' => 3,
                'genre_id' => 6,
            ),
            5 => 
            array (
                'brand_id' => 2,
                'genre_id' => 8,
            ),
            6 => 
            array (
                'brand_id' => 3,
                'genre_id' => 9,
            ),
        ));
        
        
    }
}
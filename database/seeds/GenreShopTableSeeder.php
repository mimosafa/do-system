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
                'shop_id' => 1,
                'genre_id' => 1,
            ),
            1 =>
            array (
                'shop_id' => 1,
                'genre_id' => 2,
            ),
            2 =>
            array (
                'shop_id' => 2,
                'genre_id' => 8,
            ),
            3 =>
            array (
                'shop_id' => 3,
                'genre_id' => 9,
            ),
        ));


    }
}

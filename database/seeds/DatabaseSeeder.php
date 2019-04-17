<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersTableSeeder::class);
        $this->call(VendorsTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(GenreShopTableSeeder::class);
        $this->call(AdvertisementsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

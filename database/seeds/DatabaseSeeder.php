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
        $this->call(UsersTableSeeder::class);
        $this->call(VendorsTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(BrandGenreTableSeeder::class);
        $this->call(AdvertisementsTableSeeder::class);
    }
}

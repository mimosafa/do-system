<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            [
                'vendor_id' => 1,
                'name' => 'トウキョウドゥベンツ',
                'vin' => '品川88つ555',
            ], [
                'vendor_id' => 1,
                'name' => 'トウキョウドゥグラマン',
                'vin' => '品川88そ7246',
            ], [
                'vendor_id' => 1,
                'name' => 'トウキョウドゥグラマン搬入車',
                'vin' => '品川100す251',
            ], [
                'vendor_id' => 1,
                'name' => 'ドック車',
                'vin' => '品川800さ3127',
            ], [
                'vendor_id' => 4,
                'name' => 'ボナペティ',
                'vin' => '練馬800す2669',
            ],
        ];

        foreach ($cars as $car) {
            extract($car);
            DB::table('cars')->insert([
                'vendor_id' => $vendor_id,
                'name' => $name,
                'vin' => $vin,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

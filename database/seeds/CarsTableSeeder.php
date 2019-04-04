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
            ['vendor_id' => 1,  'status' => 1, 'created_at' => '2019-04-03 17:42:36', 'vin' => '品川88つ555', 'name' => 'トウキョウドゥベンツ',],
            ['vendor_id' => 1,  'status' => 1, 'created_at' => '2019-04-03 17:42:36', 'vin' => '品川88そ7246', 'name' => 'トウキョウドゥグラマン',],
            ['vendor_id' => 1,  'status' => 0, 'created_at' => '2019-04-03 17:42:36', 'vin' => '品川100す251', 'name' => 'トウキョウドゥグラマン搬入車',],
            ['vendor_id' => 1,  'status' => 0, 'created_at' => '2019-04-03 17:42:36', 'vin' => '品川800さ3127', 'name' => 'ドック車',],
            ['vendor_id' => 4,  'status' => 0, 'created_at' => '2019-04-03 17:42:36', 'vin' => '練馬800す2669', 'name' => 'ボナペティ',],
            ['vendor_id' => 2,  'status' => 0, 'created_at' => '2019-04-04 12:25:56', 'vin' => '練馬800す2388', 'name' => 'elephant box',],
            ['vendor_id' => 1,  'status' => 0, 'created_at' => '2019-04-04 12:58:24', 'vin' => '品川880あ740', 'name' => 'ネオ2号',],
            ['vendor_id' => 14, 'status' => 0, 'created_at' => '2019-04-04 13:20:33', 'vin' => '品川830さ1966', 'name' => 'パラダイス',],
        ];

        foreach ($cars as $car) {
            extract($car);
            DB::table('cars')->insert([
                'vendor_id' => $vendor_id,
                'name' => $name,
                'vin' => $vin,
                'created_at' => $created_at,
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

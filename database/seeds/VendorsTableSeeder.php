<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendors = [
            ['name' => 'TokyoDo', 'status' => 1],
            ['name' => 'elephant box', 'status' => 8],
            ['name' => 'HANAカレー', 'status' => 9],
            ['name' => 'ボナペティ', 'status' => 1],
        ];
        foreach ($vendors as $vendor) {
            DB::table('vendors')->insert([
                'name' => $vendor['name'],
                'status' => $vendor['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

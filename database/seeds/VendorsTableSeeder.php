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
            ['status' => 1, 'created_at' => '2019-04-02 19:51:57', 'name' => 'トウキョウドゥ',], # 1
            ['status' => 8, 'created_at' => '2019-04-02 19:51:57', 'name' => 'elephant box',], # 2
            ['status' => 9, 'created_at' => '2019-04-02 19:51:57', 'name' => 'HANAカレー',], # 3
            ['status' => 1, 'created_at' => '2019-04-02 19:51:57', 'name' => 'ボナペティ',], # 4
            ['status' => 9, 'created_at' => '2019-04-03 12:14:15', 'name' => '朔（ｓａｋｕ）',], # 5
            ['status' => 9, 'created_at' => '2019-04-03 12:35:15', 'name' => 'ランチ・ランチ',], # 6
            ['status' => 9, 'created_at' => '2019-04-03 15:22:59', 'name' => 'イーストダイナー',], # 7
            ['status' => 8, 'created_at' => '2019-04-03 15:30:26', 'name' => 'タコデリオ',], # 8
            ['status' => 9, 'created_at' => '2019-04-03 15:42:56', 'name' => 'M\'s com',], # 9
            ['status' => 9, 'created_at' => '2019-04-03 15:58:37', 'name' => 'スブラキハウス',], # 10
            ['status' => 1, 'created_at' => '2019-04-03 16:01:13', 'name' => 'アジアンランチ',], # 11
            ['status' => 9, 'created_at' => '2019-04-03 16:32:05', 'name' => 'YammY',], # 12
            ['status' => 9, 'created_at' => '2019-04-04 13:19:36', 'name' => 'スープ ファクトリー',], # 13
            ['status' => 1, 'created_at' => '2019-04-04 13:19:59', 'name' => 'パラダイス',], # 14
        ];
        foreach ($vendors as $vendor) {
            DB::table('vendors')->insert([
                'name' => $vendor['name'],
                'status' => $vendor['status'],
                'created_at' => $vendor['created_at'],
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

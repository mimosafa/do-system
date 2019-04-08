<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 全て削除
        User::truncate();

        User::create([
            'name' => 'テスト太郎',
            'email' => 'mail+dosystemtest@w-tokyodo.com',
            'password' => Hash::make('tesutotarou'),
        ]);
    }
}

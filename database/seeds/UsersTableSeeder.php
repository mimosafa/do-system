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
            'name' => 'admin',
            'email' => 'mail@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}

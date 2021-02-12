<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
          [
            [
              'id' => 1,
              'name' => 'ブルー',
              'email' => 'blue@gmail.com',
              'age' => 28,
              'gender' => 0,
              'from' => '東京（渋谷区）',
              'password' => bcrypt('blue1234'),
            ],
            [
              'id' => 2,
              'name' => '田中',
              'email' => 'tanaka@gmail.com',
              'age' => 23,
              'gender' => 1,
              'from' => '東京（目黒区）',
              'password' => bcrypt('tanaka1234'),
            ],
          ]
        );
    }
}

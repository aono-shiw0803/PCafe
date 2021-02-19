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
              'name' => 'blue',
              'email' => 'blue@gmail.com',
              'age' => 28,
              'gender' => 1,
              'from' => '東京（渋谷区）',
              'password' => bcrypt('blue1234'),
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
            ],
            [
              'id' => 2,
              'name' => 'tanaka',
              'email' => 'tanaka@gmail.com',
              'age' => 23,
              'gender' => 0,
              'from' => '東京（目黒区）',
              'password' => bcrypt('tanaka1234'),
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
            ],
            [
              'id' => 3,
              'name' => 'omasa',
              'email' => 'omasa@gmail.com',
              'age' => 29,
              'gender' => 0,
              'from' => '東京（世田谷区）',
              'password' => bcrypt('omasa1234'),
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
            ],
            [
              'id' => 4,
              'name' => 'mimura',
              'email' => 'mimura@gmail.com',
              'age' => 32,
              'gender' => 1,
              'from' => '東京（江戸川区）',
              'password' => bcrypt('mimura1234'),
              'created_at' => new DateTime(),
              'updated_at' => new DateTime(),
            ],
          ]
        );
    }
}

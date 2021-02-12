<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');
    //
    //     $response->assertStatus(200);
    // }

    public function testExample()
    {
      $user = new \App\User;
      $user->name = 'ブルー';
      $user->email = 'blue@gmail.com';
      $user->password = \Hash::make('blue1234');
      $user->save();

      $readUser = \App\User::where('name', '田中')->first();
      $this->assertNotNull($readUser);
      $this->assertTrue(\Hash::check('blue1234', $readUser->password));
      \App\User::where('email', 'tanaka@gmail.com')->delete();
    }
}

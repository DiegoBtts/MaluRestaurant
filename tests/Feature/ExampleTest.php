<?php

namespace Tests\Feature;
use App\models\UserModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
     use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
           $user = factory(UserModel::class)->save([
            'username'    => 'demo',
            'name'      =>'demo',
            'password' => bcrypt('demo'),
        ]);
    }
}
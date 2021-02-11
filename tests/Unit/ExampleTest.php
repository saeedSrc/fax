<?php

namespace Tests\Unit;





use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $this->assertTrue(true);

        $this->postJson(route('register'),
               [
            'first_name' =>'test',
            'last_name' =>'testi',
            'phone' =>'091231223421',
                   'password' => '123',
                   'auth_check' => '1',
                   'type' => 'normal',
                   'pages' => '0',
        ]);

        $this->assertDatabaseHas('users', [
            'phone' =>'09141580837',
        ]);

//        $response = $this->getJ('/');
//
//        $response->assertStatus(200);
    }
}

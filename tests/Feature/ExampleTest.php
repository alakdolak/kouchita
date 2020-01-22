<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    private $status = [200, 302];

    /**
     * A basic test example.
     *
     * @return void
     */

//    public function testBasicTest()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus($this->status);
//    }
    
    public function testSa() {
        
        $response = $this->post(route('myTest'), ['msg' => 'salam']);

        $response->assertStatus($this->status);
        
    }

    public function setUp()
    {
        parent::setUp();
        app(Request::class);
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
	use RefreshDatabase;
    /** @test */
    public function test_display_laravel()
    {
    	// $this
     //        ->get('/')
     //        ->assertSee('Laravel');

    	$response = $this->get('/');
        $response->assertStatus(200);
    }
}

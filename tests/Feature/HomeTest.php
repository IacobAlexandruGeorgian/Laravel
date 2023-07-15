<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageText()
    {
        $response = $this->actingAs($this->user())->get('/');

        $response->assertSeeText('Hello world!');
    }

    public function testContactPageText()
    {
        $response = $this->get('/contact');

        $response->assertSeeText('Contact');
    }
}

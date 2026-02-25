<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function checking()
    {
        $EmailData=EmailData::create([
            'email'=>'sai@gmail.com',
            'subject'=>'subject',
            'message'=>'message',
            'created_at'=>now()
        ]);
        $this->assertNotNull($EmailData);
        $this->assertEquals('subject',$EmailData->subject);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HeartbeatTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function health_check_test()
    {
        $response = $this->get('/api/heartbeat');

        $response->assertStatus(200);
    }
}

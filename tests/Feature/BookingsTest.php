<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingsTest extends TestCase
{
    /**
     * Test to get all users
     *
     * @return void
     */
    public function testGetAllBookings()
    {
        $response = $this->get('/api/bookings');
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success'
        ]);
    }
}

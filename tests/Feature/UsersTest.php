<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    /**
     * Test to get all users
     *
     * @return void
     */
    public function testGetAllUsers()
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success'
        ]);
    }
}

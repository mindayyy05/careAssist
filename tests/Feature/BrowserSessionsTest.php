<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrowserSessionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_other_browser_sessions_can_be_logged_out(): void
    {
        // Create and log in the user
        $user = User::factory()->create();
        //$this->actingAs($user);

        // Simulate a logout of other sessions
        $response = $this->post('/logout-other-sessions');
        $response->assertStatus(200);

        // Check if the user is logged out from other sessions
        $this->assertGuest();
    }
}

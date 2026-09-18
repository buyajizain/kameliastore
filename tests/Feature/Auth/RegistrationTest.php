<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_honeypot_traps_bots_and_prevents_registration(): void
    {
        $response = $this->post('/register', [
            'name' => 'Spam Bot',
            'email' => 'spambot@spamdomain.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'preferred_contact_method' => 'Buy Cheap Watches at spam.com',
        ]);

        // Assert user was NOT created in DB and NOT authenticated
        $this->assertGuest();
        $this->assertDatabaseMissing('users', [
            'email' => 'spambot@spamdomain.com',
        ]);
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_registration_is_rate_limited(): void
    {
        for ($i = 0; $i < 6; $i++) {
            $this->post('/register', [
                'name' => "User {$i}",
                'email' => "user{$i}@example.com",
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);
            $this->post('/logout');
        }

        // 7th attempt within the same minute should be throttled (HTTP 429)
        $response = $this->post('/register', [
            'name' => 'User Spam',
            'email' => 'userspam@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(429);
    }
}

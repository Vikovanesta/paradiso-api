<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_login_success()
    {
        $response = $this->post('/api/v1/auth', [
            'name' => 'merchant',
            'email' => 'merchant@mail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'user' => [
                        'id',
                        'name',
                        'email',
                        'created_at',
                        'updated_at'
                    ],
                    'token'
                ]
            ]);
    }

    public function test_login_name_not_found()
    {
        $response = $this->post('/api/v1/auth', [
            'name' => 'merchant123',
            'email' => 'merchant@mail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(401)
            ->assertJson([
                'message' => 'User not found',
                'errors' => [
                    'message' => 'Incorrect name, email or password',
                ]
            ]);
    }

    public function test_login_email_not_found()
    {
        $response = $this->post('/api/v1/auth', [
            'name' => 'merchant',
            'email' => 'mwfetko23948iio@mail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(401)
            ->assertJson([
                'message' => 'User not found',
                'errors' => [
                    'message' => 'Incorrect name, email or password',
                ]
            ]);
    }

    public function test_login_password_incorrect()
    {
        $response = $this->post('/api/v1/auth', [
            'name' => 'merchant',
            'email' => 'merchant@mail.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(401)
            ->assertJson([
                'message' => 'User not found',
                'errors' => [
                    'message' => 'Incorrect name, email or password',
                ]
            ]);
    }

    public function test_logout_success()
    {
        $this->test_login_success();

        $user = User::where('email', 'merchant@mail.com')->first();

        $response = $this->actingAs($user)->post('/api/v1/logout');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'Request success',
                'message' => 'Logged out',
                'data' => null,
            ]);
    }
}

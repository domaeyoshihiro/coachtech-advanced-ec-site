<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'role' => 1,
        ]);
    }
    public function test_admin_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/management');
        $response->assertStatus(200);
    }
    public function test_admin_representative_user_store()
    {
        $data = [
            'name' => 'representaitive',
            'email' => 'representaitive@example.com',
            'password' => 'password',
            'role' => 2,
        ];
        $response = $this->actingAs($this->user)->post(route('admin.create'), $data);
        $response->assertRedirect('/admin/representative/add/complete');
        $this->assertDatabaseHas('users', [
            'name' => 'representaitive',
            'email' => 'representaitive@example.com'
        ]);
    }
    
}

<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneralTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'role' => 3,
        ]);
        $this->area = Area::factory()->create();
        $this->genre = Genre::factory()->create();
        $this->shop = Shop::factory()->create();
    }
    public function test_general_page()
    {
        $response = $this->actingAs($this->user)->get('/');
        $response->assertStatus(200);
    }
    public function test_general_detail_page()
    {
        $response = $this->actingAs($this->user)->get('/detail/'. $this->shop->id);
        $response->assertStatus(200);
    }
    public function test_general_mypage()
    {
        $response = $this->actingAs($this->user)->get('/mypage/'. $this->user->id);
        $response->assertStatus(200);
    }
}

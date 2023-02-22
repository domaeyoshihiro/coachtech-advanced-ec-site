<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneralReviewTest extends TestCase
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
    public function test_review_list()
    {
        $review = Review::factory()->create();
        $response = $this->actingAs($this->user)->get('/review/list/'. $this->shop->id);
        $response->assertStatus(200);
    }
    public function test_review_store_page()
    {
        $response = $this->actingAs($this->user)->get('/review/'. $this->shop->id);
        $response->assertStatus(200);
    }
}

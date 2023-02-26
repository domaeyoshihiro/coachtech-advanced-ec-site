<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Like;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneralLikeTest extends TestCase
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
    public function test_like_store()
    {
        $data = [
            'shop_id' => $this->shop->id,
            'user_id' => $this->user->id,
        ];
        $response = $this->actingAs($this->user)->post('/like/add/' . $this->shop->id, $data);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('likes', $data);
    }
    public function test_like_destroy()
    {
        $data = [
            'user_id' => $this->user->id,
        ];
        $like = Like::factory()->create();
        $response = $this->actingAs($this->user)->post('/like/delete/' . $this->shop->id, $data);
        $response->assertStatus(302);
        $this->assertDeleted('likes', [
            'user_id' => $this->user->id,
            'shop_id' => $this->shop->id,
        ]);
    }
}

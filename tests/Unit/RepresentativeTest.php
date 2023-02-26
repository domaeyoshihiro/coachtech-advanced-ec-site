<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RepresentativeTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'role' => 2,
        ]);
        $this->area = Area::factory()->create();
        $this->genre = Genre::factory()->create();
        
    }
    public function test_representative__page()
    {
        $response = $this->actingAs($this->user)->get('/representative/management');
        $response->assertStatus(200);
    }
    public function test_representative_shop_store()
    {
        $file = new UploadedFile(storage_path('app/public/test_img/about.jpg'), 'about.jpg', null, null, true);
        $data = [
            "user_id" => $this->user->id,
            "shopname" => "shop",
            "detail" => "detail",
            "area_id" => $this->area->id,
            "genre_id" => $this->genre->id,
            "image" => $file,
        ];
        Storage::fake('public');
        $response = $this->actingAs($this->user)->from('representative/management')->post(route('shop.create'), $data);
        $response->assertRedirect('/representative/management');
        $this->assertDatabaseHas('shops', [
            'shopname' => 'shop',
            'detail' => 'detail'
        ]);
    }
}

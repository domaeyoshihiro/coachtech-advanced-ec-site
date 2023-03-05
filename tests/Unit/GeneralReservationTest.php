<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneralReservationTest extends TestCase
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
    public function test_reservation_store()
    {
        $data = [
            "date" => "2023-04-04",
            "time" => "03:02",
            "number" => "2",
            "shop_id" => $this->shop->id,
            "user_id" => $this->user->id,
            "course_id" => null,
        ];
        $response = $this->actingAs($this->user)->post(route('reservation.create'), $data);
        $response->assertRedirect('/done');
        $this->assertDatabaseHas('reservations', [
            'reservation_time' => '2023-04-04 03:02:00',
            'number' => '2'
        ]);
    }
    public function test_reservation_update()
    {
        $reservation = Reservation::factory()->create();
        $data = [
            "date" => "2023-04-23",
            "time" => "05:33",
            "number" => "4",
            "shop_id" => $this->shop->id,
            "user_id" => $this->user->id,
        ];
        $response = $this->actingAs($this->user)->post('/edit/' . $reservation->id, $data);
        $this->assertDatabaseHas('reservations',[
            'reservation_time' => '2023-04-23 05:33:00',
            'number' => '4'
        ]);
    }
    public function test_reservation_destroy()
    {
        $reservation = Reservation::factory()->create();
        $response = $this->actingAs($this->user)->post('/reservation/delete/' . $reservation->id);
        $response->assertStatus(302);
        $this->assertDeleted('reservations', ['id' => $reservation->id]);
    }
}

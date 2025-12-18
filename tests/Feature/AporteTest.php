<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Aporte;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;

class AporteTest extends TestCase
{
    use RefreshDatabase;

    public function test_nao_permite_aporte_com_data_futura()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('aportes.store'), [
            'data_aporte' => Carbon::now()->addDay()->toDateString(),
            'valor' => 100,
            'ativo' => 'PETR4',
            'tipo' => 'Variável',
        ]);

        $response->assertSessionHasErrors('data_aporte');

        $this->assertDatabaseCount('aportes', 0);
    }
}

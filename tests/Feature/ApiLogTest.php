<?php

namespace Tests\Feature;

use App\Models\AccessLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiLogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testar criação de log de acesso
     */
    public function test_can_create_access_log(): void
    {
        $response = $this->postJson('/api/log', [
            'latitude' => -23.5505,
            'longitude' => -46.6333,
            'accuracy' => 10.5,
            'note' => 'Teste de localização'
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'ok' => true,
            ]);

        $this->assertDatabaseHas('access_logs', [
            'latitude' => -23.5505,
            'longitude' => -46.6333,
        ]);
    }

    /**
     * Testar validação de latitude inválida
     */
    public function test_rejects_invalid_latitude(): void
    {
        $response = $this->postJson('/api/log', [
            'latitude' => 100, // Latitude inválida
            'longitude' => -46.6333,
        ]);

        $response->assertStatus(422);
    }

    /**
     * Testar validação de longitude inválida
     */
    public function test_rejects_invalid_longitude(): void
    {
        $response = $this->postJson('/api/log', [
            'latitude' => -23.5505,
            'longitude' => 200, // Longitude inválida
        ]);

        $response->assertStatus(422);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ApiPhotoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    /**
     * Testar upload de foto
     */
    public function test_can_upload_photo(): void
    {
        $file = UploadedFile::fake()->image('photo.jpg', 800, 600);

        $response = $this->postJson('/api/upload-photo', [
            'photo' => $file,
            'note' => 'Foto de teste'
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'ok' => true,
            ]);

        // Verificar se arquivo foi armazenado
        Storage::disk('public')->assertExists('photos/' . $response->json('filename'));
    }

    /**
     * Testar rejeição de arquivo muito grande
     */
    public function test_rejects_oversized_file(): void
    {
        $file = UploadedFile::fake()->image('photo.jpg')->size(6000); // 6MB

        $response = $this->postJson('/api/upload-photo', [
            'photo' => $file,
        ]);

        $response->assertStatus(422);
    }

    /**
     * Testar rejeição de arquivo que não é imagem
     */
    public function test_rejects_non_image_file(): void
    {
        $file = UploadedFile::fake()->create('document.pdf', 1000);

        $response = $this->postJson('/api/upload-photo', [
            'photo' => $file,
        ]);

        $response->assertStatus(422);
    }
}

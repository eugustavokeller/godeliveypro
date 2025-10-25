<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadPhotoRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Obter IP real do cliente, considerando proxy reverso
     */
    private function getClientIp(Request $request): string
    {
        $xff = $request->header('X-Forwarded-For');
        return $xff ? trim(explode(',', $xff)[0]) : $request->ip();
    }

    /**
     * Upload de foto com captura da câmera
     */
    public function upload(UploadPhotoRequest $request)
    {
        $ip = $this->getClientIp($request);

        // Obter arquivo e validar
        $file = $request->file('photo');
        $originalName = $file->getClientOriginalName();

        // Gerar nome único para o arquivo
        $filename = uniqid('photo_', true) . '.' . $file->getClientOriginalExtension();

        // Armazenar arquivo no disco público
        $path = $file->storeAs('photos', $filename, 'public');

        // Criar registro no banco de dados
        $photo = Photo::create([
            'filename' => $filename,
            'original_name' => $originalName,
            'ip' => $ip,
            'user_agent' => $request->userAgent(),
            'note' => $request->note,
        ]);

        // Log append-only para auditoria
        Storage::append('proofs.log', json_encode([
            'type' => 'photo',
            'id' => $photo->id,
            't' => now()->toIso8601String(),
            'ip' => $ip,
            'ua' => $request->userAgent(),
            'filename' => $filename,
            'original_name' => $originalName,
            'note' => $request->note,
        ]));

        return response()->json([
            'ok' => true,
            'id' => $photo->id,
            'filename' => $filename,
            'url' => Storage::url($path),
            'message' => 'Foto enviada com sucesso'
        ], 201);
    }
}

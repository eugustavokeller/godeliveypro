<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLogRequest;
use App\Models\AccessLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
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
     * Criar registro de log de acesso
     */
    public function store(StoreLogRequest $request)
    {
        $ip = $this->getClientIp($request);
        // Criar registro no banco de dados
        $accessLog = AccessLog::create([
            'ip' => $ip,
            'user_agent' => $request->userAgent(),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'accuracy' => $request->accuracy,
            'note' => $request->note,
        ]);
        // Log append-only para auditoria (não pode ser modificado)
        Storage::append('proofs.log', json_encode([
            'id' => $accessLog->id,
            't' => now()->toIso8601String(),
            'ip' => $ip,
            'ua' => $request->userAgent(),
            'lat' => $request->latitude,
            'lng' => $request->longitude,
            'acc' => $request->accuracy,
            'note' => $request->note,
        ]));
        return response()->json([
            'ok' => true,
            'id' => $accessLog->id,
            'message' => 'Localização registrada com sucesso'
        ], 201);
    }

    /**
     * Endpoint de debug para verificar IP detectado
     */
    public function whoami(Request $request)
    {
        return response()->json([
            'ip' => $this->getClientIp($request),
            'user_agent' => $request->userAgent(),
            'all_headers' => $request->headers->all(),
        ]);
    }
}

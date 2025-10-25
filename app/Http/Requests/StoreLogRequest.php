<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogRequest extends FormRequest
{
    /**
     * Determinar se o usuário está autorizado a fazer esta requisição
     */
    public function authorize(): bool
    {
        return true; // Permitir acesso público
    }

    /**
     * Regras de validação
     */
    public function rules(): array
    {
        return [
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'accuracy' => 'nullable|numeric|min:0',
            'note' => 'nullable|string|max:500',
        ];
    }

    /**
     * Mensagens de validação personalizadas
     */
    public function messages(): array
    {
        return [
            'latitude.required' => 'A latitude é obrigatória',
            'latitude.numeric' => 'A latitude deve ser um número',
            'latitude.between' => 'A latitude deve estar entre -90 e 90',
            'longitude.required' => 'A longitude é obrigatória',
            'longitude.numeric' => 'A longitude deve ser um número',
            'longitude.between' => 'A longitude deve estar entre -180 e 180',
            'accuracy.numeric' => 'A precisão deve ser um número',
            'accuracy.min' => 'A precisão deve ser maior ou igual a 0',
            'note.max' => 'A nota não pode ter mais de 500 caracteres',
        ];
    }
}

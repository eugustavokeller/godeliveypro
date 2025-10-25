<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPhotoRequest extends FormRequest
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
            'photo' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120', // max 5MB
            'note' => 'nullable|string|max:500',
        ];
    }

    /**
     * Mensagens de validação personalizadas
     */
    public function messages(): array
    {
        return [
            'photo.required' => 'A foto é obrigatória',
            'photo.image' => 'O arquivo deve ser uma imagem',
            'photo.mimes' => 'A imagem deve ser JPEG, JPG, PNG ou WEBP',
            'photo.max' => 'A imagem não pode ter mais de 5MB',
            'note.max' => 'A nota não pode ter mais de 500 caracteres',
        ];
    }
}

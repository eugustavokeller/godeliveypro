<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    use HasFactory;

    /**
     * Os atributos que são atribuíveis em massa
     */
    protected $fillable = [
        'ip',
        'user_agent',
        'latitude',
        'longitude',
        'accuracy',
        'note',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos
     */
    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'accuracy' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

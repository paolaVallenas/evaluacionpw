<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atributos que pueden ser asignados masivamente
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo_usuario',
    ];

    /**
     * Atributos que deben ocultarse al serializar
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atributos que deben transformarse a tipos nativos
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

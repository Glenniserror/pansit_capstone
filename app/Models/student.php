<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Importante ito
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
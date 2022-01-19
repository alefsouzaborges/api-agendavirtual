<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacoes extends Model
{
    use HasFactory;
    protected $fillable = [
        'email_usuario',
        'email_empresa',
        'situacao'
    ];
}


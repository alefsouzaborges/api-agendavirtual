<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasDisponiveis extends Model
{
    use HasFactory;
    protected $Fillable = [
        'email_empresa',
        'email_funcionario',
        'dia',
        'nome_dia',
        'mes',
        'nome_mes',
        'ano'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorariosDisponiveis extends Model
{
    use HasFactory;
    protected $Fillable = [
        'email_funcionario',
        'email_empresa',
        'hora',
        'dia',
        'mes',
        'ano'
    ];
}

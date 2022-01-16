<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionariosVinculados extends Model
{
    use HasFactory;
    protected $fillable = [
        'email_funcionario',
        'email_empresa',
        'especialidade',
        'status'
    ];
}

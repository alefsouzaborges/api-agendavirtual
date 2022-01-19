<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoVinculados extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_servico',
        'email_funcionario'
    ];
}

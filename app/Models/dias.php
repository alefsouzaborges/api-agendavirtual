<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dias extends Model
{
    use HasFactory;
    protected $Fillable = [
        'dia',
        'nome_dia',
        'mes',
        'nome_mes',
        'ano',
    ];
}

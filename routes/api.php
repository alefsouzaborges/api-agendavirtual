<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FuncionariosVinculadosController;


Route::get('usuarios/', [UsuarioController::class, 'index']);
/////////////////////////////////////////////////////////////
Route::get('funcionarios/vinculados/', [FuncionariosVinculadosController::class, 'index']);
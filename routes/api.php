<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FuncionariosVinculadosController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\SolicitacoesController;


Route::get('usuarios/', [UsuarioController::class, 'index']);
Route::post('usuarios/login', [UsuarioController::class, 'login']);
/////////////////////////////////////////////////////////////
Route::post('usuarios/criar_conta_cliente', [UsuarioController::class, 'createaccountClient']);
Route::post('usuarios/criar_conta_empresa', [UsuarioController::class, 'createaccountEmpresa']);
Route::get('funcionarios/vinculados/', [FuncionariosVinculadosController::class, 'index']);
///////////////////////////////////////////////////////////////
Route::get('/count_solicitacoes/{email}', [UsuarioController::class, 'countSolicitacoes']);
Route::get('/solicitacoes/{email}', [UsuarioController::class, 'solicitacoes']);
//////////////////////////////////////////////////////////////
Route::post('usuarios/especialidades', [especialidadesController::class, 'store']);
Route::get('usuarios/especialidades/{email_empresa}', [especialidadesController::class, 'especialidadesByEmail']);
Route::post('usuarios/especialidades/deletar/', [especialidadesController::class, 'deletarEspecialidade']);
/////////////////////////////////////////////////////////////
Route::get('/usuarios/buscar_empresa/{cpf_cnpj}', [UsuarioController::class, 'buscarEmpresa']);
////////////////////////////////////////////////////////////
Route::post('/solicitacoes', [SolicitacoesController::class, 'store']);
Route::post('/solicitacoes/aceitar_solicitacoes', [SolicitacoesController::class, 'aceitarSolicitacao']);
Route::post('/solicitacoes/recusar_solicitacoes', [SolicitacoesController::class, 'recusarSolicitacao']);


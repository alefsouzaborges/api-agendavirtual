<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FuncionariosVinculadosController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\SolicitacoesController;
use App\Http\Controllers\AberturaController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\AnoController;
use App\Http\Controllers\MesesController;
use App\Http\Controllers\DiasController;


Route::get('usuarios/', [UsuarioController::class, 'index']);
Route::post('usuarios/login', [UsuarioController::class, 'login']);
Route::get('/usuarios/listar_funcionarios_vinculados/{email}', [FuncionariosVinculadosController::class, 'listar_funcionarios']);
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
////////////////////////////////////////////////////////////
Route::get('/abertura', [AberturaController::class, 'index']);
Route::post('/abertura/gerar_horarios', [AberturaController::class, 'store']);
Route::post('/abertura/deletar_abertura', [AberturaController::class, 'destroy']);
////////////////////////////////////////////////////////////
Route::post('/servicos/criar_servico', [ServicosController::class, 'store']);
Route::get('/servicos/servicos_vincular/{emailEmpresa}', [ServicosController::class, 'servicos_vincular']);
Route::get('/servicos/servicos_vinculados/{email}', [ServicosController::class, 'servicos_vinculados']);
Route::get('/servicos/vincular_servico/{id}/{email}', [ServicosController::class, 'vincularServico']);
Route::get('/servicos/desvincular_servico/{id}/{email}', [ServicosController::class, 'desvincularServico']);
//////////////////////////////////////////////////////
Route::get('/ano', [AnoController::class, 'index']);
Route::post('/ano', [AnoController::class, 'store']);
//////////////////////////////////////////////////////
Route::get('/mes', [MesesController::class, 'index']);
Route::post('/mes', [MesesController::class, 'store']);
//////////////////////////////////////////////////////
Route::get('/dia/{mes}/{ano}', [DiasController::class, 'index']);
Route::post('/dia', [DiasController::class, 'store']);


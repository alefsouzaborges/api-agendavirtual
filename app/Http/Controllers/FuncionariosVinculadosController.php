<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuncionariosVinculados;
use Illuminate\Support\Facades\DB;


class FuncionariosVinculadosController extends Controller
{

    public function index()
    {
        return FuncionariosVinculados::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function listar_funcionarios($email)
    {
        $ListarFuncioarios = DB::select("SELECT * FROM funcionarios_vinculados");

        
        if($ListarFuncioarios){

            return response()->json(array('success' => true, 'response' => $ListarFuncioarios));

        }else{

            return response()->json(array('success' => false, 'response' => 'Nenhum funcionario vinculado.'));

        }

    }
}

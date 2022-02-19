<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dias;

class DiasController extends Controller
{
    public function index($mes, $ano)
    {
        $Dias =  DB::select("SELECT * FROM dias WHERE nome_mes = '${mes}' and ano = '${ano}'");

        if(count($Dias) > 0){

            return response()->json(array('success' => true, 'response' => $Dias));

        }else{

            return response()->json(array('success' => false, 'response' => 'Sem dia cadstrado!'));

        }
    }

    public function store(Request $request)
    {
        $Dia = new dias;
        $Dia->dia = $request['dia'];
        $Dia->mes = $request['mes'];
        $Dia->ano = $request['ano'];

        
        if($Dia->save()){

            return response()->json(array('success' => true, 'response' => 'Dia adicionado com sucesso!'));

        }else{

            return response()->json(array('success' => false, 'response' => 'Não foi possivel adicionar o dia.'));

        }
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
}

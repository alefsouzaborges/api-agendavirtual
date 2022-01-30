<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Abertura;

class AberturaController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $Abertura = new Abertura;

        $Abertura->horario = $request['horario'];

        if($Abertura->save()){

            return response()->json(array('success' => true, 'response' => $Abertura));

        }else{

            return response()->json(array('success' => false, 'response' => 'Não foi possivel configurar os horarios.'));

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

    public function destroy(Request $request)
    {
        $Abertura = DB::delete('TRUNCATE table aberturas');

      
        if($Abertura){

            return response()->json(array('success' => true, 'response' => 'Abertura deletada com sucesso!'));

        }else{

            return response()->json(array('success' => false, 'response' => 'Não foi possivel deletar a abertura'));

        }


        
    }
}

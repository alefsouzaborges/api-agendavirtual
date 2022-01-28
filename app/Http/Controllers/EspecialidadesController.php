<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Especialidades;

class EspecialidadesController extends Controller
{
    public function index()
    {
        return Especialidades::all();
    }

    public function store(Request $request)
    {
        $especialidades = new Especialidades;
        $especialidades->email_empresa = $request['email_empresa'];
        $especialidades->descricao = $request['descricao'];

        if($especialidades->save()){
            return response()->json(array('success' => true, 'response' => 'Especialidade cadastrada com sucesso!'));

        }else{
            return response()->json(array('success' => true, 'response' => 'Não foi possivel realizar o cadastro. 
            tente novamente mais tarde!'));
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

    public function especialidadesByEmail($email_empresa)
    {
        $especialidades = DB::select("SELECT * from especialidades where email_empresa = '${email_empresa}'");

        if(count($especialidades) > 0){
            
            return response()->json(array('success' => true, 'response' => $especialidades));
        
        }else{

            return response()->json(array('success' => false, 'response' => 'Nenhuma especialidade cadastrada!'));

        }
    }

    public function deletarEspecialidade(Request $id)
    {
        $id_esp = $id['id'];
        
        $Deletarespecialidades = DB::delete("DELETE FROM especialidades where id = '${id_esp}'");

        if($Deletarespecialidades){
            
            return response()->json(array('success' => true, 'response' => 'Especialidade removida com sucesso!'));
        
        }else{

            return response()->json(array('success' => false, 'response' => 'Erro ao processar!'));

         }
    }

}

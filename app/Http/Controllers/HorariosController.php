<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horarios;

class HorariosController extends Controller
{

    public function index()
    {
        $Horarios =  Horarios::all();

        if(count($Horarios) > 0){
            return response()->json(array('success' => true, 'response' => $Horarios));
        }{
            return response()->json(array('success' => false, 'response' => 'Nenhum horário dispnivel.'));
        }
    }

    public function create()
    {
        //
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
}

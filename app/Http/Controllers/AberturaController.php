<?php

namespace App\Http\Controllers;

use App\Models\Abertura;

class AberturaController extends Controller
{
    public function index()
    {
        return Abertura::all();
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

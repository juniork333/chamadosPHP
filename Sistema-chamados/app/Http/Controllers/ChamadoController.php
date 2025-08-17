<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    public function index()
    {
        return Chamado::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'status' => 'in:aberto,em_andamento,fechado'
        ]);

        return Chamado::create($validated);
    }

    public function show($id)
    {
        return Chamado::findOrFail($id);
    }

    public function update(Request $request, $id)
{
    $chamado = Chamado::findOrFail($id);

    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'status' => 'in:aberto,em_andamento,fechado'
    ]);

    $chamado->update($validated);

    return $chamado;
}

}
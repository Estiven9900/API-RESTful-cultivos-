<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cultivo;

class CultivoController extends Controller
{
    public function index()
    {
        $cultivos = Cultivo::all();
        return view('cultivos.index', compact('cultivos'));
    }

    public function create()
    {
        return view('cultivos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:500',
            'fecha' => 'required|date',
        ]);

        Cultivo::create($request->all());

        return redirect()->route('cultivos.index')->with('success', 'Cultivo agregado correctamente');
    }

    public function edit($id)
    {
        $cultivo = Cultivo::findOrFail($id);
        return response()->json($cultivo);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:500',
            'fecha' => 'required|date',
        ]);

        $cultivo = Cultivo::findOrFail($id);
        $cultivo->update($request->all());

        return response()->json(['success' => 'Cultivo actualizado correctamente']);
    }

    public function destroy($id)
    {
        $cultivo = Cultivo::findOrFail($id);
        $cultivo->delete();

        return response()->json(['success' => 'Cultivo eliminado correctamente']);
    }
}
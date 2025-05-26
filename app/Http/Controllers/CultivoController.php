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

        $cultivo = new Cultivo();
      
        $cultivo->nombre = $request->input('nombre');
        $cultivo->tipo = $request->input('tipo');
        $cultivo->fecha = $request->input('fecha');
        $cultivo->save();

        return redirect()->route('cultivos.index')->with('success', 'Cultivo agregado correctamente');
    }
}
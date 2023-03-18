<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ave;
use App\Models\Area;
use App\Models\Avistamiento;

class AvistamientoController extends Controller
{
    public function store(Request $request)
    {
        // Validamos los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'numero_avistamientos' => 'required|string',
            'area_id' => 'required|string',
            'ave_id' => 'required|integer|exists:aves,id'
        ]);

        // Creamos un nuevo avistamiento con los datos del formulario
        $avistamiento = new Avistamiento();
        $avistamiento->fecha = $request->input('fecha');
        $avistamiento->numero_avistamientos = $request->input('numero_avistamientos');
        $avistamiento->ave_id = $request->input('ave_id');
        $avistamiento->area_id = $request->input('area_id');

        // Guardamos el nuevo avistamiento en la base de datos
        $avistamiento->save();

        // Redirigimos de vuelta a la vista show de la ave
        return redirect()->route('aves.show', $avistamiento->ave_id);
    }
}

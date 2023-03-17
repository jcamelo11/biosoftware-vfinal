<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Ave;

use Illuminate\Http\Request;

class AveController extends Controller
{
    public function index()
    {
        $aves = Ave::all();
        return view('aves.index', ['aves' => $aves]);
    }

    public function create()
    {
        return view('aves.create');
    }

    public function store(Request $request)
    { 
        // Validar los datos de entrada
        $request->validate([
            'nombre_cientifico' => 'required|string|max:255',
            'nombre_comun' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ave = new Ave;
        $ave->nombre_comun = $request->input('nombre_comun');
        $ave->nombre_cientifico = $request->input('nombre_cientifico');
        // $ave->imagen = $request->input('imagen');
        if($request->hasfile("imagen")){
            $imagen = $request->file("imagen");
            $nomimagen = str::slug($request->nombre_cientifico).".".$imagen->guessExtension();
            $ruta = public_path("imagenes/aves/");
            $imagen->move($ruta,$nomimagen);
            $ave->imagen = $nomimagen;
        }


        $ave->save();

        return redirect()->route('aves');
    }

    // public function edit(Ave $ave){
    //     return view('aves.edit', compact('ave'));
    // }

    public function edit($id)
    {
        $ave = Ave::findOrFail($id);
        return view('aves.edit', compact('ave'));
    }

    public function update(Request $request, Ave $ave)
    {
        $request->validate([
            'nombre_comun' => 'required',
            'nombre_cientifico' => 'required',
            'imagen' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nomimagen = Str::slug($request->nombre_cientifico) . '.' . $imagen->getClientOriginalExtension();
            $ruta = public_path('imagenes/aves/');
            $imagen->move($ruta, $nomimagen);
            $ave->imagen = $nomimagen;
        }

        $ave->nombre_comun = $request->nombre_comun;
        $ave->nombre_cientifico = $request->nombre_cientifico;
        
        $ave->save();

        return redirect()->route('aves');
    }

    public function destroy($id)
    {
        $ave = Ave::findOrFail($id);
        $ave->avistamientos()->delete();
        $ave->delete();

        return redirect()->route('aves');
    }

    public function show($id)
    {
        $ave = Ave::findOrFail($id);

        return view('aves.show', compact('ave'));
    }


}

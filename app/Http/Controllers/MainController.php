<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Ave;
use App\Models\Area;
use App\Models\User;
use App\Models\Avistamiento;

use Illuminate\Http\Request;

class MainController extends ControllerBase
{
    
    public function index()
    {
        // $aves = Ave::all();
        // $aveCount = Ave::count();
        // $avistamientosTotales = Avistamiento::sum('numero_avistamientos');

        // $aveMayorAvistamientos = DB::table('avistamientos')
        //     ->join('aves', 'avistamientos.ave_id', '=', 'aves.id')
        //     ->select('aves.nombre_comun', 'aves.nombre_cientifico', 'aves.imagen', DB::raw('SUM(avistamientos.numero_avistamientos) as total_avistamientos'))
        //     ->groupBy('aves.id', 'aves.nombre_comun', 'aves.nombre_cientifico', 'aves.imagen')
        //     ->orderBy('total_avistamientos', 'desc')
        //     ->first();

        // $aveMenorAvistamientos = DB::table('avistamientos')
        //     ->join('aves', 'avistamientos.ave_id', '=', 'aves.id')
        //     ->select('aves.nombre_comun', 'aves.nombre_cientifico', 'aves.imagen', DB::raw('SUM(avistamientos.numero_avistamientos) as total_avistamientos'))
        //     ->groupBy('aves.id', 'aves.nombre_comun', 'aves.nombre_cientifico', 'aves.imagen')
        //     ->orderBy('total_avistamientos', 'asc')
        //     ->first();
       
        // return view('landing_pages.welcome', [
        //     'avistamientosTotales' => $avistamientosTotales,
        //     'aveCount' => $aveCount
        // ]);
       
     
         $sharedData = $this->getSharedData();
         return view('landing_pages.welcome', $sharedData);
     
    }



    public function especies ()
    {
        $aves = Ave::all();
        $areas = Area::all();
        $areas = Avistamiento::all();

        
    $totalAvistamientosPorAve = Avistamiento::select('ave_id', DB::raw('sum(numero_avistamientos) as total'))
    ->groupBy('ave_id')
    ->get();

    $aves = $aves->map(function ($ave) use ($totalAvistamientosPorAve) {
        $matchingAvistamientos = $totalAvistamientosPorAve->where('ave_id', $ave->id);
        if ($matchingAvistamientos->isNotEmpty()) {
            $ave->avistamientos_totales = $matchingAvistamientos->first()->total;
        } else {
            $ave->avistamientos_totales = 0;
        }
        return $ave;
    });



        return view('landing_pages.pages.especies', compact('aves'));
    }

    public function show($id)
    {
        $ave = Ave::findOrFail($id);
        $areas = Area::all();
        $avistamientos = Avistamiento::all();

        return view('landing_pages.pages.ver', compact('ave', 'areas', 'avistamientos'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
    
        $ave = Ave::where('nombre_comun', 'like', '%'.$q.'%')
            ->orWhere('nombre_cientifico', 'like', '%'.$q.'%')
            ->first();
    
        if (!$ave) {
            $term = $request->input('q');
            return view('landing_pages.pages.no_aves_found')->with('searchTerm', $term);
        } else {
            return redirect()->route('especies.show', $ave->id);
        }
    }
    

    public function areas ()
    {


        return view('landing_pages.pages.areas');
    }

    public function nosotros ()
    {
        return view('landing_pages.pages.nosotros');
    }

}

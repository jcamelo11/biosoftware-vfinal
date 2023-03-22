<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ave;
use App\Models\Avistamiento;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function index()
    {
        $userCount = User::count();
        $aveCount = Ave::count();
        $aves = Ave::all();
        $avistamientosTotales = Avistamiento::sum('numero_avistamientos');

        $aveMayorAvistamientos = DB::table('avistamientos')
            ->join('aves', 'avistamientos.ave_id', '=', 'aves.id')
            ->select('aves.nombre_comun', 'aves.nombre_cientifico', 'aves.imagen', DB::raw('SUM(avistamientos.numero_avistamientos) as total_avistamientos'))
            ->groupBy('aves.id', 'aves.nombre_comun', 'aves.nombre_cientifico', 'aves.imagen')
            ->orderBy('total_avistamientos', 'desc')
            ->first();

        $aveMenorAvistamientos = DB::table('avistamientos')
            ->join('aves', 'avistamientos.ave_id', '=', 'aves.id')
            ->select('aves.nombre_comun', 'aves.nombre_cientifico', 'aves.imagen', DB::raw('SUM(avistamientos.numero_avistamientos) as total_avistamientos'))
            ->groupBy('aves.id', 'aves.nombre_comun', 'aves.nombre_cientifico', 'aves.imagen')
            ->orderBy('total_avistamientos', 'asc')
            ->first();

        $datosMapa = DB::table('avistamientos')
            ->join('areas', 'avistamientos.area_id', '=', 'areas.id')
            ->select('areas.lat', 'areas.log', DB::raw('count(*) as total'))
            ->groupBy('areas.lat', 'areas.log')
            ->get();
        
        return view('home', compact('datosMapa', 'userCount', 'aveCount', 'avistamientosTotales', 'aves', 'aveMayorAvistamientos', 'aveMenorAvistamientos'));
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ave;
use App\Models\Area;
use App\Models\user;
use App\Models\Avistamiento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;



class AvistamientoController extends Controller
{
    public function __construct(){
        $this->middleware('can:avistamientos.index')->only('index');
        $this->middleware('can:avistamientos.store')->only( 'store');

    }

    public function store(Request $request)
    {
        // Validamos los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'numero_avistamientos' => 'required|string',
            'area_id' => 'required|string',
            'ave_id' => 'required|integer|exists:aves,id'
        ]);
    
        // Obtenemos el usuario autenticado actualmente
        $usuario = Auth::user();
    
        // Creamos un nuevo avistamiento con los datos del formulario
        $avistamiento = new Avistamiento();
        $avistamiento->fecha = $request->input('fecha');
        $avistamiento->numero_avistamientos = $request->input('numero_avistamientos');
        $avistamiento->ave_id = $request->input('ave_id');
        $avistamiento->area_id = $request->input('area_id');
        
        // Asignamos el nombre y apellido del usuario al avistamiento
        $avistamiento->nombre_usuario = $usuario->name;
        $avistamiento->apellido_usuario = $usuario->apellido;
    
        // Guardamos el nuevo avistamiento en la base de datos
        $avistamiento->save();
    
        $notificacion = "Se ha registrado el avistamiento correctamente";
    
        // Redirigimos de vuelta a la vista show de la ave
        return redirect()->route('aves.show', $avistamiento->ave_id)->with(compact('notificacion'));
    }

    public function index(Request $request)
    {
        $ave_id = $request->get('ave_id');
        $area_id = $request->get('area_id');
        $year = $request->get('year');

        
    
        $avistamientos = Avistamiento::with('ave')
            ->when($ave_id, function ($query, $ave_id) {
                return $query->where('ave_id', $ave_id);
            })
            ->when($area_id, function ($query, $area_id) {
                return $query->where('area_id', $area_id);
            })
            ->when($year, function ($query, $year) {
                return $query->whereYear('fecha', $year);
            })
            ->selectRaw('ave_id, area_id, fecha, sum(numero_avistamientos) as numero_avistamiento, nombre_usuario, apellido_usuario')
            ->groupBy('ave_id', 'area_id', 'fecha', 'nombre_usuario', 'apellido_usuario')
            ->orderBy('fecha', 'desc');
    
        // Ejecutar la consulta y obtener los resultados
        $avistamientos = $avistamientos->paginate(50); // Obtener los resultados paginados

    
        $aves = Ave::orderBy('nombre_comun')->get();
        $areas = Area::orderBy('nombre')->get();
        $years = Avistamiento::selectRaw('YEAR(fecha) as year')->distinct()->orderBy('year', 'desc')->get();
    
        
        // Verificar si hay resultados y pasarlos a la vista
        return view('avistamientos', compact('avistamientos', 'ave_id', 'area_id', 'year', 'aves', 'areas', 'years'));

    }

    public function buscarAves(Request $request)
    {
        $term = $request->input('term');

        $aves = Ave::select('id', 'nombre_comun')
            ->where('nombre_comun', 'LIKE', '%'.$term.'%')
            ->get();

        return response()->json($aves);
    }

    
    

    
    

    
}

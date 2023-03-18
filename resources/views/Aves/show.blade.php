@extends('layouts.panel')

@section('content')
@include('includes.panel.topnav', ['title' => 'Mostar aves'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
            <div class="card mb-4">
                
                <div class="card-body ">
                   <h5 class="mb-4">Informacion de la ave </h5>
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 text-center">
                        <img class="w-100 border-radius-lg shadow-lg mx-auto" src="{{ asset('imagenes/aves/' . $ave->imagen) }}" alt="{{ $ave->nombre_comun }}">
                        </div>
                        <div class="col-lg-5 mx-auto">
                            <h3 class="mt-lg-0 mt-4">{{ $ave->nombre_comun }}</h3>
                            <h5 class=" text-success">{{ $ave->nombre_cientifico }}</h5>
                            <span class="my-2 text-xs">
                               <span class="badge bg-gradient-info">estatus de conservacion</span>
                            </span><br>
                            <label class="mt-2">Descripción</label>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil dolorum maxime est totam officiis nostrum exercitationem quia cumque voluptatem velit. Quis nostrum debitis, culpa ipsam laboriosam corporis velit dolor aperiam.</p>
                            <hr class="horizontal dark">
                            <h6 class="mb-0 font-weight-bold">Nuevo avistamiento</h6>
                            <div class="row mt-4">
                               <div class="col-lg-4 mt-lg-0 mt-2">
                               <form method="POST" action="{{ route('avistamientos.store') }}">
                                @csrf
                                    <input type="hidden" name="ave_id" value="{{ $ave->id }}">
                                    <label for="area_id">Área</label>
                                    <select class="form-control" id="area_id" name="area_id" required>
                                        <option value="">Selec un área</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>{{ $area->nombre }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-lg-4 mt-lg-0 mt-2">
                                    <label>Fecha</label>
                                    <input class="form-control" type="date" id="fecha" name="fecha" value="{{ old('fecha') }}" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Cantidad</label>
                                        <input class="form-control" type="number" id="numero_avistamientos" name="numero_avistamientos" value="{{ old('numero_avistamientos') }}" required>
                                    </div>
                                    </div>
                                    <div class="col-8 mt-3 mx-auto text-center text-end">
                                        <button class="btn btn-success mb-0" type="submit" href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Nuevo avistamiento</button>
                                        
                                    </div>
                                </form>    
                        </div>
                        <div class="row mt-5">
                            <!-- <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bold">Total de avistamientos</h6>
                                <div class="dropdown text-end">
                                    <button class="btn bg-gradient-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Success
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                             -->
                             <div class="col-md-4 d-flex"><h6 class="mb-0 font-weight-bold">Total de avistamientos</h6>
                            </div>
                             <div class="col-md-4 offset-md-4 "><div class="dropdown">
                                    <button class="btn bg-gradient-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Success
                                    </button>
                                    <ul class="dropdown-menu text" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div></div>
                               
                            
                            
                        </div>
                        <div class="container-fluid py-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                            @foreach($areas as $area)
                                                <th class="  text-xx font-weight-bold text-center  ps-2">{{ $area->nombre }}</th>
                                            @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            
                                                
                                                @foreach($areas as $area)
                                                    <td class="align-middle text-center" href="javascript:;" class="w-100 text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="antropica">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        
                                                        <span class="badge bg-gradient-success">{{ $avistamientosPorArea->where('area_id', $area->id)->first()->total ?? 0 }}</span>

                                                    </div>

                                                    </td>
                                                    
                                                @endforeach

                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                           </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            </div>
        </div>
        
    </div> 
@endsection
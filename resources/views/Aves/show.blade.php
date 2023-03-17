@extends('layouts.panel')

@section('content')
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
                            </span>
                            
                            
                            <hr class="horizontal dark">
                            <label class="mt-2">Descripción</label>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil dolorum maxime est totam officiis nostrum exercitationem quia cumque voluptatem velit. Quis nostrum debitis, culpa ipsam laboriosam corporis velit dolor aperiam.</p>
                        </div>
                        <div class="row mt-5">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bold">Avistamientos</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn btn-success mb-0" href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Nueva avistamiento</a>
                                <a class="btn btn-warning mb-0" href="#"><i class="fas fa-eye"></i>&nbsp;&nbsp;Total de avistamientos</a>
                            </div>
                            
                            
                        </div>
                        <div class="container-fluid py-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                            <th class="  text-xx font-weight-bold text-center  ps-2">Antropica </th>
                                            <th class="  text-xx font-weight-bold text-center  ps-2"> Acuicultura</th>
                                            <th class="  text-xx font-weight-bold text-center  ps-2"> Esp. Menores</th>
                                            <th class="  text-xx font-weight-bold text-center  ps-2">Ganadaría </th>
                                            <th class="  text-xx font-weight-bold text-center  ps-2"> Vivero</th>
                                            <th class="  text-xx font-weight-bold text-center  ps-2"> Cultivo</th>
                                            <th class="  text-xx font-weight-bold text-center  ps-2">Bosque </th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            
                                                <td class="align-middle text-center" href="javascript:;" class="w-100 text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="antropica">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                    <span class="badge bg-gradient-success">20</span>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center" href="javascript:;" class="w-100 text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Acuicultura">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                    <span class="badge bg-gradient-success">20</span>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center" href="javascript:;" class="w-100 text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Espc. Menores">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                    <span class="badge bg-gradient-success">20</span>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center" href="javascript:;" class="w-100 text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Ganadaría">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                    <span class="badge bg-gradient-success">20</span>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center" href="javascript:;" class="w-100 text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Vivero">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                    <span class="badge bg-gradient-success">20</span>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center" href="javascript:;" class="w-100 text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Cultivo">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                    <span class="badge bg-gradient-success">20</span>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center" href="javascript:;" class="w-100 text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Bosque">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                    <span class="badge bg-gradient-success">20</span>
                                                    </div>
                                                </td>
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
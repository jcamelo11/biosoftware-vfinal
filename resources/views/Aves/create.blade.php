@extends('layouts.panel')

@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-10 mx-auto">
            <form method="POST" action="{{ route('aves.store') }}" enctype="multipart/form-data">
               @csrf
                <div class="card mb-4">
                    <div class="card-header pb-4">
                        <div class="row ">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Agregar nueva especie</h6>
                        </div>
                        <div class="col-6 text-end">
                        <button class="btn btn-success mb-0" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;Guardar</button>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nombre común</label>
                            <input class="form-control" type="text" name="nombre_comun" id="nombre_comun" placeholder="Nombre común">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nombre cientifíco</label>
                            <input class="form-control" type="text" name="nombre_cientifico" id="nombre_cientifico" placeholder="Nombre cientifíco">
                        </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Imagen</label>
                            <input class="form-control" type="file" name="imagen" id="imagen">
                        </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </form>    
        </div>
    </div>
      
</div>  
@endsection
@extends('layouts.panel')

@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-4">
                <div class="row ">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Listado de especies</h6>
                  </div>
                  <div class="col-6 text-end">
                  <a class="btn btn-success mb-0" href="{{ route('aves.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Nueva Ave</a>
                  </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Foto</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Nombre Común</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-4">Nombre Científico</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($aves as $ave)
                        <tr>
                            <td class="text-sm font-weight-normal" style="text-align: center;">
                                <span class="my-2 text-xs">
                                <img src="{{ asset('imagenes/aves/'.$ave->imagen) }}" alt="{{ $ave->nombre_comun }}" class="border-radius-lg shadow-sm height-100 w-auto">
                                </span>
                            </td>
                            <td class="text-sm text-center font-weight-bold">{{ $ave->nombre_comun }}</td>
                            <td class="text-sm text-center font-weight-bold">{{ $ave->nombre_cientifico }}</td>
                            <td class="align-middle  text-center">
                              <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('aves.show', $ave->id) }}"><i class="fas fa-eye"></i></a>
                              <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('aves.edit', $ave->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                              <a class="btn btn-link text-danger text-gradient px-2 mb-0"  onclick="event.preventDefault(); document.getElementById('delete-form').submit();" href="{{ route('aves.destroy', $ave->id) }}"><i class="far fa-trash-alt me-2"></i></a>
                              <form id="delete-form" action="{{ route('aves.destroy', $ave->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-muted">
              2 days ago
            </div>
          </div>
        </div>
    </div>
      
</div>  
@endsection
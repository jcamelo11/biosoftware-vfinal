@extends('layouts.panel')

@section('content')
@include('includes.panel.topnav', ['title' => 'Perfil'])
<div class="card shadow-lg mx-4 mt-4">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{ asset('img/pajarito.png') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              {{ auth()->user()->name }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Admin
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Editar perfil</p>
                <button class="btn btn-primary btn-sm ms-auto">Guardar</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Información del usuario</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nombre</label>
                    <input class="form-control" type="text">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Apellido</label>
                    <input class="form-control" type="email" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Correo electronico</label>
                    <input class="form-control" type="text" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Cambiar contraseña</p>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Contraseña actual</label>
                    <input class="form-control" type="password" value="New York">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nueva contraseña</label>
                    <input class="form-control" type="password" value="United States">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Repetir contraseña</label>
                    <input class="form-control" type="password" value="437300">
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <img src="{{ asset('img/perfilbg.png') }}" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src="{{ asset('img/pajarito.png') }}" class="rounded-circle img-fluid border border-2 border-white">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-2">
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">89</span>
                      <span class="text-sm opacity-8">Avistamientos registrados</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
                <h5>
                {{ auth()->user()->name }}
                </h5>
                <div class="h6 font-weight-300">
                   <i class="far fa-envelope p-1"></i>{{ auth()->user()->email }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

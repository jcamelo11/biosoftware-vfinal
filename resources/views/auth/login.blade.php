@extends('layouts.from')

@section('content')

<!-- page contenet-->
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">iniciar sesión</h4>
                  <p class="mb-0">Ingrese su correo electrónico y contraseña para iniciar sesión</p>
                </div>
                <div class="card-body">

                  @if ($errors->any())

                      <div class="alert alert-danger text-white" role="alert">
                        {{ $errors->first() }}
                      </div>

                  @endif
                  
                  <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>

                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" id="password"name="password" required autocomplete="current-password">
                    </div>

                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">Recuérdame</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0">iniciar sesión</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-3 text-sm mx-auto">
                    ¿Olvidaste tu contraseña?
                    <a href="{{ route('password.request') }}" class="text-success text-gradient font-weight-bold">Recuperar</a>
                  </p>
                  <p class="mb-4 text-sm mx-auto">
                    ¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="text-success text-gradient font-weight-bold">Regístrese</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-success h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://images.pexels.com/photos/7722518/pexels-photo-7722518.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load');
          background-size: cover;">
                <span class="mask bg-gradient-success opacity-2"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Descubre el canto de la naturaleza en un clic"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

@endsection

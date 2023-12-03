<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Sistema Asistencial Lucia Quispe Nina</title>
</head>
<body>
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="{{ asset('images/menu.jpg') }}" class="card-img-top" alt="Imagen 1">
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form method="POST" action="{{ route('login.submit') }}">
                            @csrf

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Login | I.E Lucia Quispe Nina</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Logueate con tus credenciales</h5>

                            <div class="form-outline mb-4">
                                <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example17">correo electrónico</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example27">contraseña</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                            </div>
                            @if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
@endif

<a class="small text-muted" >Olvidaste tu contraseña?</a>

                            <p class="mb-5 pb-lg-2" style="color: #393f81;">No tienes una cuenta?
                                <a href="{{ route('registro') }}"
                                style="color: #393f81;"  href="{{ route('registro') }}">Regístrate aquí</a></p>
                            <a href="#!" class="small text-muted">Terms of use.</a>
                            <a href="#!" class="small text-muted">Privacy policy</a>
                        </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

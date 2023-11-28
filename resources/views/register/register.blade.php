<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse en el sistema asistencial Lucia Quispe Nina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <style>
        @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
    </style>
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                  class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                  alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registro de usuario</h3>

                  <form method="POST"  action="{{ route('register.store') }}" class="px-md-2">
                    @csrf
                    <div class="form-outline mb-4">
                      <input type="text" id="form3Example1q" name="name" @required(true) class="form-control" />
                      <label class="form-label"  for="form3Example1q">Nombre  <span style="color: red">(*)</span></label>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                          <input type="text" class="form-control" name="lastname" id="exampleDatepicker1" />
                          <label for="exampleDatepicker1" class="form-label"@required(true)>Apellido<span style="color: red">(*)</span></label>
                        </div>

                      </div>
                      <div class="col-md-6 mb-4">

                        <select class="select" name="role">

                          <option value="admi" >Administrador</option>
                          <option value="docente" >Docente</option>
                          <option value="padre">Padre</option>
                        </select>

                      </div>
                      <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                          <input type="text" class="form-control" name="password" id="exampleDatepicker1" />
                          <label for="exampleDatepicker1" class="form-label" @required(true)>Contraseña <span style="color: red">(*)</span></label>
                        </div>


                      </div>
                      <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                            <input type="text" class="form-control" name="email" id="exampleDatepicker1" />
                            <label for="exampleDatepicker1" class="form-label"@required(true)>Correo eletrónico<span style="color: red">(*)</span></label>
                          </div>

                      </div>





                    </div>
                    <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                      <div class="col-md-6">
                      </div>
                    </div>

                   <!-- Resto del formulario ... -->

<div class="row mb-4 pb-2 pb-md-0 mb-md-5">
    <div class="col-md-6 text-center"> <!-- Centra los botones horizontalmente -->
        <button type="submit" class="btn btn-success btn-lg mb-1">Registrarse</button>
    </div>
    <div class="col-md-6 text-center"> <!-- Centra los botones horizontalmente -->
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg mb-1">Iniciar sesión</a>
    </div>
</div>

<!-- Resto del formulario ... -->

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




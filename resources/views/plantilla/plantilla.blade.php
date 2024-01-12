<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-<tu-integridad>" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <title>Sistema Asistencial Lucia Quispe Nina</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="bg-color-clase text-center  align-items-center justify-content-center fixed-top">
        @include('plantilla.header') <!-- Incluye el encabezado -->
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 mt-5">
                @include('plantilla.sidebar') <!-- Incluye el Sidebar -->

            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-flex">


                @yield('estilos')
                @yield('content') <!-- Esta sección se rellenará en las vistas específicas -->
                @yield('scripts')
                <div class="sticky-element">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Usuarios en línea:</span>
                            <span class="fw-bold">{{$usuariosEnLinea->count()}}
                            </span>
                        </a>
                        <div class="fw-bold pl-3">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>




                                            <!-- Agrega cualquier otra columna que desees mostrar -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($usuariosEnLinea as $index => $usuario)
                                            <tr class="{{ $index >= 3 ? 'fila-adicional' : '' }}">
                                                <td>{{ $index + 1 }} </td>
                                                <td>{{ $usuario->name }} {{ $usuario->lastname }}    </td>
                                                <td>
                                                    <img src="{{ asset('images/online.gif') }}" class="custom-img" alt="Imagen 1">
                                                </td>


                                                <!-- Agrega cualquier otra columna que desees mostrar -->
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">No hay usuarios en línea en este momento, mi loco.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>



                                </table>
                            </div>
                        </div>
                    </li>

                </ul>
                @if (count($usuariosEnLinea) > 2)
                                        <p id="verMasEnlace" class=" h5 bg-danger text-white text-center">Ver más</p>
                                    @endif
                            </div>
                        </nav>


                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const filasAdicionales = document.querySelectorAll('.fila-adicional');
                        const verMasEnlace = document.getElementById('verMasEnlace');

                        // Oculta las filas adicionales al cargar la página
                        filasAdicionales.forEach(function (fila) {
                            fila.style.display = 'none';
                        });

                        // Muestra u oculta las filas adicionales al hacer clic en "Ver más"
                        verMasEnlace.addEventListener('click', function () {
                            filasAdicionales.forEach(function (fila) {
                                fila.style.display = fila.style.display === 'none' ? '' : 'none';
                            });
                        });
                    });
                </script>
                <style>
                    .custom-img {
                    max-width: 75%;
                    height: auto;
                }

                </style>

                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Agrega tus scripts JS aquí, como Bootstrap o scripts personalizados -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<div>

</div>
    <footer class="footer-wrapper fixed-bottom">

        @include('plantilla.footer')
    </footer>
</body>

<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .container-fluid {
        min-height: 90%;
        display: flex;
        flex-direction: column;
    }

    main {
        flex-grow: 1;
        position: relative;
    }

   .sticky-element {
        position: -webkit-sticky;

        position: fixed;
        bottom: 90px; /* Ajusta la posición según tus necesidades */
        background-color: #ddd;
        padding: 14px; /* Ajusta el padding para el sticky de usuarios conectados */
        text-align: center;
        font-size: 14px; /* Ajusta el tamaño del texto */
        z-index: 100;
        left: 110px;
        width: 13%; /* O ajusta el ancho según tus preferencias */
    }

    footer {
        flex-shrink: 0;
    }

    /* Estilo para el efecto hover y cursor pointer */
    .card:hover {
        transform: scale(1.05); /* Efecto de escala al hacer hover */
        cursor: pointer; /* Cambia el cursor a pointer al hacer hover */
    }

    body {
        padding-top: 90px; /* Ajusta este valor según la altura de tu encabezado */
        padding-bottom: 1200px;
    }

    @media (max-width: 768px) {
        body {
            padding-top: 140px; /* Ajusta este valor para pantallas más pequeñas */
            padding-bottom: 900px;
        }
    }
</style>
</html>

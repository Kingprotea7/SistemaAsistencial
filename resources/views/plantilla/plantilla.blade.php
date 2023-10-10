<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Panel de Tarjetas Bootstrap</title>
</head>
<body>
    <header>
        @include('plantilla.header') <!-- Incluye el encabezado -->
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 mt-5">
                @include('plantilla.sidebar') <!-- Incluye el Sidebar -->
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content') <!-- Esta sección se rellenará en las vistas específicas -->

                
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Agrega tus scripts JS aquí, como Bootstrap o scripts personalizados -->

    <footer class="footer-wrapper">
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
}

footer {
    flex-shrink: 0;
}

        /* Estilo para el efecto hover y cursor pointer */
        .card:hover {
            transform: scale(1.05); /* Efecto de escala al hacer hover */
            cursor: pointer; /* Cambia el cursor a pointer al hacer hover */
        }

</style>
</html>

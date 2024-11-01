@extends('layouts.template')

@section('header2')
    <title>{{ $comunidad->nombre }}</title>
    <!-- Google Fonts for Modern Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .pagetitle {
            margin-bottom: 20px;
        }

        .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            font-weight: 700;
            color: #343a40;
        }

        .card {
            border-radius: 12px;
        }

        .card-header {
            border-bottom: none;
        }

        .card-body {
            padding: 30px;
        }

        .card-footer {
            background-color: #f9f9f9;
            border-top: none;
        }

        .card img {
            border-radius: 8px;
            max-height: 180px;
            object-fit: cover;
        }

        .text-primary {
            color: #007bff !important;
        }

        /* Espaciado para las tarjetas adicionales */
        .card .me-3 img,
        .card .me-3 iframe {
            border-radius: 10px;
        }

        /* Sombreado suave para las tarjetas */
        .shadow-sm {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* Animación hover en las tarjetas */
        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
        }

        /* Espaciado entre las tarjetas adicionales */
        .card-body.row.g-4 .col-md-4,
        .card-body.row.g-4 .col-md-8 {
            padding: 15px;
        }

        /* Sección de contacto */
        .card-title.text-primary {
            font-weight: 600;
        }

        .fab {
            margin-right: 8px;
        }

        /* Ajuste de tamaño en dispositivos móviles */
        @media (max-width: 768px) {
            .card img {
                max-height: 150px;
            }

            .breadcrumb-item {
                font-size: 14px;
            }

            .card-body.row.g-4 .col-md-8 {
                padding-top: 20px;
            }
        }

        table {
            width: auto;

            border-collapse: collapse;
            /* Elimina el espacio entre bordes */
        }

        th,
        td {
            border: 1px solid black;
            /* Bordes de la tabla */
            padding: 8px;
            /* Espaciado dentro de las celdas */
            text-align: left;
            /* Alineación del texto */
        }

        th {
            background-color: #f2f2f2;
            /* Color de fondo para la cabecera */
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            /* Espaciado entre los elementos */
        }

        .gallery-item {
            flex: 1 1 calc(33% - 15px);
            /* Tres elementos por fila, ajuste según el espacio */
            background: #fff;
            /* Fondo blanco para cada tarjeta */
            border-radius: 5px;
            /* Bordes redondeados */
            overflow: hidden;
            /* Para evitar el desbordamiento de la imagen */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Sombra sutil */
            transition: transform 0.3s;
            /* Transición suave */
        }

        .gallery-item:hover {
            transform: scale(1.05);
            /* Efecto de aumento al pasar el ratón */
        }

        .gallery-item img {
            width: 100%;
            /* Hacer que las imágenes se ajusten al contenedor */
            height: auto;
            /* Mantener la proporción */
        }
    </style>
@endsection

@section('header')
    <div class="pagetitle">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('layouts.template') }}">Home</a></li>
                <li class="breadcrumb-item">Comunidades</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $comunidad->nombre }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection

@section('content')
    <div class="container mt-4">
        <!-- Tarjeta principal de la comunidad -->
        <div class="card shadow-sm mb-5">
            <div class="card-header text-center bg-primary text-white">
                <h2 class="mb-0 display-4" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                    <i class="fas fa-map-marked-alt me-2"></i>{{ $comunidad->nombre }}
                </h2>
            </div>

            <div class="card-body row g-4">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('/usuariotemplate/administracion/assets/img/paisaje.jpg') }}"
                        alt="{{ $comunidad->nombre }}" class="img-fluid rounded">
                </div>
                <div class="col-md-8">
                    <h5 class="card-title text-primary">Descripción</h5>
                    <p class="card-text">{{ $comunidad->descripcion }}</p>

                    <h5 class="card-title text-primary">Zona</h5>
                    <p class="card-text">{{ $comunidad->zona }}</p>
                </div>
            </div>
            <div class="card-footer text-muted text-center">
                Última actualización: {{ $comunidad->updated_at->format('d/m/Y H:i') }}
            </div>
        </div>

        <!-- Sección de tarjetas adicionales -->
        <div class="row mt-5">
            <!-- Ubicación -->
            <div class="col-md-12">
                <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                    <div class="me-3">
                        <div class="ratio ratio-1x1" style="width: 120px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3794.572925442221!2d-63.3837083!3d-17.998595899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1b8192c80b041%3A0x21db223cd744cfc8!2sJardin%20De%20Las%20Delicias%2C%20El%20Torno!5e0!3m2!1ses-419!2sbo!4v1728539465057!5m2!1ses-419!2sbo"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div>
                        <h5 class="card-title text-primary">Ubicación <i class="fas fa-map-marker-alt"></i></h5>
                        <p class="card-text">¿COMO LLEGAR?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                    <div class="me-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQchDpwBuO7zn5RR8eSCu_tDP-027BPbOZ3KA&s"
                            alt="Restaurante" class="rounded" style="width: 120px;" alt="Alojamiento">
                    </div>
                    <div>
                        <h5 class="card-title text-primary">Gastronomia <i class="fas fa-bed"></i></h5>
                        <p class="card-text">El Parque de las Delicias también ofrece la posibilidad de disfrutar de comidas
                            al aire libre, preparadas en fogatas o parrillas improvisadas, donde los visitantes pueden
                            degustar pescados frescos a la parrilla como el sábalo, acompañado de ensaladas elaboradas con
                            vegetales frescos de la zona. Además, es común que las comunidades locales preparen una variedad
                            de jugos naturales y refrescantes chichas de maíz o de maní, bebidas tradicionales que
                            complementan perfectamente las comidas típicas.

                        </p>
                        <table>
                            <tr>
                                <th>Comida</th>
                                <th>Precio(bs)</th>

                            </tr>
                            <tr>
                                <td>Majadito</td>
                                <td>25</td>

                            </tr>
                            <tr>
                                <td>Locro</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>Pollo al Horno</td>
                                <td>22</td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Alojamiento -->
            <div class="col-md-12 mt-3">
                <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                    <div class="me-3">
                        <img src="https://amboro-360-grados.santacruztophotels.com/data/Images/OriginalPhoto/7439/743932/743932021/image-santa-cruz-de-la-sierra-amboro-360-grados-1.JPEG"
                            class="rounded" style="width: 120px;" alt="Alojamiento">
                    </div>
                    <div>
                        <h5 class="card-title text-primary">Alojamiento <i class="fas fa-bed"></i></h5>
                        <p class="card-text">Consiste en cabañas ecológicas que ofrecen una experiencia inmersiva en la
                            naturaleza.</p>
                        <p><strong>Capacidad Máxima:</strong> 4 Personas</p>
                        <p><strong>Costo:</strong> 200 Bs Por Noche</p>
                    </div>
                </div>
            </div>


            <!-- Transporte -->
            <div class="col-md-12 mt-3">
                <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                    <div class="me-3">
                        <img src="https://www.tarija200.com/storage/posts/September2019/E01FXDkRfHASG3BcXqzs.jpg"
                            class="rounded" style="width: 120px;" alt="Transporte">
                    </div>
                    <div>
                        <h5 class="card-title text-primary">Transporte <i class="fas fa-bus"></i></h5>
                        <p class="card-text"><strong>Camioneta Privada</strong></p>
                        <p><strong>Capacidad Máxima:</strong> 4 Personas</p>
                        <p><strong>Costo:</strong> 200 Bs Por Noche</p>

                        <p><strong>Santa Cruz – El Torno (Líneas 101-133)</strong></p>

                        <p>Transporte Público: <strong>6-10 Bs</strong> Trufis y Micros</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary display-4">ACTIVIDADES <i class="fas fa-bus"></i></h5>
                    <div class="gallery-container d-flex flex-wrap">
                        <div class="gallery-item">
                            <img src="{{ asset('/usuariotemplate/administracion/assets/img/tirolesa.jpeg') }}"
                                alt="Tirolesa" class="img-fluid rounded">
                            <h6 class="mt-2 text-dark">Tirolesa</h6>
                            <p class="text-muted">Disfruta de la adrenalina mientras cruzas sobre el paisaje natural
                                desde las alturas.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('/usuariotemplate/administracion/assets/img/rappel.jpeg') }}" alt="Rappel"
                                class="img-fluid rounded">
                            <h6 class="mt-2 text-dark">Rappel</h6>
                            <p class="text-muted">Desciende por las paredes de roca junto a las cascadas.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('/usuariotemplate/administracion/assets/img/trekking.jpg') }}"
                                alt="Trekking y Senderismo" class="img-fluid rounded">
                            <h6 class="mt-2 text-dark">Trekking y Senderismo</h6>
                            <p class="text-muted">Rutas que te llevan por la exuberante vegetación y hacia diferentes
                                puntos panorámicos de las cataratas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
        


        <!-- Sección de Rutas Disponibles en la Comunidad -->
        <div class="container mt-5">
            <h3 class="text-primary text-center mb-4">Rutas Disponibles en {{ $comunidad->nombre }}</h3>
            @if ($comunidad->rutas->isEmpty())
                <p class="text-muted text-center">No hay rutas disponibles en esta comunidad actualmente.</p>
            @else
                <div class="row">
                    @foreach ($comunidad->rutas as $ruta)
                        <div class="col-md-4 mb-4">
                            <div class="route-card shadow-sm">
                                <img src="?text=Ruta+{{ $ruta->nombre }}" alt="{{ $ruta->nombre }}">
                                <div class="route-card-body">
                                    <h5 class="text-primary">{{ $ruta->nombre }}</h5>
                                    <p class="text-muted">Explora esta ruta única en {{ $comunidad->nombre }}.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Sección de contacto -->
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h3 class="card-title text-primary">Contacto</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p><i class="fab fa-whatsapp"></i>Whatsapp: (+591) 70482396 Carla</p>
                        </div>
                        <div class="col-md-4">
                            <p><i class="fas fa-phone"></i>Whatsapp: (+591) 67758630 Roberto</p>
                        </div>
                        <div class="col-md-4">
                            <p><i class="fas fa-envelope"></i>Whatsapp: (+591) 72672767 Oliver</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

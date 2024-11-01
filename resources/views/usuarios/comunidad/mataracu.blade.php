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
                    <img src="https://i.ytimg.com/vi/b9b2j79RwSo/maxresdefault.jpg" alt="{{ $comunidad->nombre }}"
                        class="img-fluid rounded"style="width: auto; height: 500px;">
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
                                src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d7608.13175306273!2d-63.870158!3d-17.55205!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTfCsDMzJzA3LjQiUyA2M8KwNTInMDMuMyJX!5e0!3m2!1ses-419!2sbo!4v1728603474584!5m2!1ses-419!2sbo"
                                style="border:0;" allowfullscreen="" loading="lazy" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div>
                        <h5 class="card-title text-primary">Ubicación <i class="fas fa-map-marker-alt"></i></h5>
                        <p class="card-text">¿COMO LLEGAR?</p>
                    </div>
                </div>
            </div>

            <!-- Alojamiento -->
            <div class="col-md-12 mt-3">
                <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                    <div class="me-3">
                        <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/01/9c/39/d1/casitas-habitacion-doble.jpg?w=700&h=-1&s=1"
                            alt="Restaurante" class="rounded" style="width: 120px;" alt="Alojamiento">
                    </div>
                    <div>
                        <h5 class="card-title text-primary">Alojamiento <i class="fas fa-bed"></i></h5>
                        <p class="card-text">Las cabañas son de construcción rústica pero cómoda, elaboradas
                            con materiales naturales de la zona, lo que las hace sostenibles
                            y respetuosas con el medio ambiente. Los visitantes pueden disfrutar
                            de diversas actividades como caminatas por la selva, observación de aves,
                            paseos por ríos y cascadas, y participar en actividades culturales con los
                            habitantes locales, como aprender sobre las plantas medicinales y la artesanía
                            tradicional. </p>
                        <p><strong>Capacidad Máxima:</strong> 10 Personas</p>
                        <p><strong>Costo:</strong> 200 Bs Por Noche</p>
                    </div>
                </div>
            </div>

            <!-- Transporte -->
            <div class="col-md-12 mt-3">
                <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                    <div class="me-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRflXK-x2xg6g4sYzaQQ6fjaEpbqikLng2JBH5DFWdf286KNPjLMSG3ELyWhUlKcJ2tRY&usqp=CAU"
                            class="rounded" style="width: 120px;" alt="Transporte">
                    </div>
                    <div>
                        <h5 class="card-title text-primary">Transporte <i class="fas fa-bus"></i></h5>
                        <p class="card-text">
                        <table>
                            <tr>
                                <th>LINEA</th>
                                <th>DESCRIPCION</th>
                                <th>PRECIO</th>

                            </tr>
                            <tr>
                                <td>TRUFI</td>
                                <td>VEHICULO DE PRESTACION DE SERVICIOS</td>
                                <td>50 BS/PERSONA </td>
                            </tr>
                            <tr>
                                <td>VEHICULO 4X4</td>
                                <td> VEHICULO QUE INGRESARA HACIA DENTRO DE LA COMUNIDAD</td>
                                <td> 400 BS/PERSONA</td>
                            </tr>

                        </table>
                        </p>
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
                                <img src="https://via.placeholder.com/300x200?text=Ruta+{{ $ruta->nombre }}" alt="{{ $ruta->nombre }}">
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
                        <div class="col-md-6">
                            <p><i class="fab fa-whatsapp"></i> Whatsapp: (+591) 71320200</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-phone"></i> Whatsapp: (+591) 71343400</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection

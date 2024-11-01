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
                    <i class="fas fa-map-marked-alt me-2"></i> {{ $comunidad->nombre }}
                </h2>
            </div>

            <div class="card-body row g-4">
                <div class="col-md-4 text-center">
                    <img src="https://institutodelverboencarnado.org/wp-content/uploads/2022/03/267726271_4430454590386669_7716694229263374003_n.jpeg"
                        alt="{{ $comunidad->nombre }}" style="width: auto; height: 200px;" class="img-fluid rounded">
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
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7600.549802690467!2d-63.59323500642094!3d-17.731681699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f02b326618e621%3A0xc4773884ce8b5e6a!2sEcoturismo%20Comunitario%20Villa%20Amboro!5e0!3m2!1ses-419!2sbo!4v1728615191220!5m2!1ses-419!2sbo"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                        <img src="https://amboro-360-grados.santacruztophotels.com/data/Images/OriginalPhoto/7439/743932/743932021/image-santa-cruz-de-la-sierra-amboro-360-grados-1.JPEG"
                            class="rounded" style="width: 120px;" alt="Alojamiento">
                    </div>
                    <div>
                        <h5 class="card-title text-primary">Alojamiento <i class="fas fa-bed"></i></h5>
                        <p class="card-text">Cabañas ecológicas con capacidad para 2 personas, ideales para una experiencia
                            inmersiva.</p>
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
                        <p class="card-text">Tome trufis taxis desde la Antigua Terminal de Buses en Santa Cruz hasta Buena
                            Vista. Costo aproximado: Bs. 20.00 por persona.</p>
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
                        <div class="col-md-4">
                            <p><i class="fab fa-whatsapp"></i> +591 762-770-33</p>
                        </div>
                        <div class="col-md-4">
                            <p><i class="fas fa-phone"></i> +591 713-197-20</p>
                        </div>
                        <div class="col-md-4">
                            <p><i class="fas fa-envelope"></i> ecoturismo@villaamboro.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

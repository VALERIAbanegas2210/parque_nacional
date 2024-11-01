@extends('layouts.template')

@section('header2')
    <title>{{ $comunidad->nombre }}</title>
    <!-- Google Fonts for Modern Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .pagetitle { margin-bottom: 20px; }
        .breadcrumb-item a { color: #007bff; text-decoration: none; }
        .breadcrumb-item.active { font-weight: 700; color: #343a40; }
        .card { border-radius: 12px; }
        .shadow-sm { box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05); }
        
        /* Rutas en formato de tarjetas */
        .route-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
        }
        .route-card:hover {
            transform: scale(1.05);
        }
        .route-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        .route-card-body {
            padding: 15px;
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
                    <img src="https://institutodelverboencarnado.org/wp-content/uploads/2022/03/267726271_4430454590386669_7716694229263374003_n.jpeg"
                         alt="{{ $comunidad->nombre }}" class="img-fluid rounded" style="width: auto; height: 500px;">
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

        <!-- Sección de alojamiento -->
        <div class="col-md-12 mt-3">
            <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                <div class="me-3">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0e/2e/0f/e4/chalalan-ecolodge.jpg?w=700&h=-1&s=1"
                         alt="Alojamiento" class="rounded" style="width: 120px;">
                </div>
                <div>
                    <h5 class="card-title text-primary">Alojamiento <i class="fas fa-bed"></i></h5>
                    <p class="card-text">Consiste en cabañas ecológicas que ofrecen una experiencia inmersiva en la naturaleza.</p>
                    <p><strong>1 habitación privada con cama matrimonial: 70 Bs</strong> por persona</p>
                    <p><strong>1 dormitorio con 8 camas simples: 40 Bs </strong> por cama</p>
                </div>
            </div>
        </div>

    

        <!-- Sección de Ubicación -->
        <div class="col-md-12 mt-3">
            <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                <div class="me-3">
                    <div class="ratio ratio-1x1" style="width: 120px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7600.549802690467!2d-63.59323500642094!3d-17.731681699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f02b326618e621%3A0xc4773884ce8b5e6a!2sEcoturismo%20Comunitario%20Villa%20Amboro!5e0!3m2!1ses-419!2sbo!4v1728615191220!5m2!1ses-419!2sbo" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div>
                    <h5 class="card-title text-primary">Ubicación <i class="fas fa-map-marker-alt"></i></h5>
                    <p class="card-text">¿Cómo llegar? Desde Santa Cruz, tome un trufi con destino a la localidad de Buena Vista, luego pida un taxi hacia el río Surutú. Puede caminar o coordinar un caballo para los últimos 11 km.</p>
                </div>
            </div>
        </div>

        <!-- Sección de Gastronomía -->
        <div class="col-md-12 mt-3">
            <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                <div class="me-3">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrOU4yKbOOfTq5TKhRsQ_u5K5jZp-zA0FO_g&s" alt="Gastronomía" class="rounded" style="width: 120px;">
                </div>
                <div>
                    <h5 class="card-title text-primary">Gastronomía <i class="fas fa-utensils"></i></h5>
                    <p class="card-text">La gastronomía local destaca por ingredientes frescos y autóctonos como maíz, yuca, y carne de monte.</p>
                    <table class="table table-borderless text-start">
                        <tr><th>Plato</th><th>Precio (Bs)</th></tr>
                        <tr><td>Masaco</td><td>15</td></tr>
                        <tr><td>Locro</td><td>15</td></tr>
                        <tr><td>Majadito</td><td>25</td></tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sección de Transporte -->
        <div class="col-md-12 mt-3">
            <div class="card shadow-sm h-100 d-flex flex-row align-items-center">
                <div class="me-3">
                    <img src="https://s.alicdn.com/@sc04/kf/H16d2b0347ed84e89acb69cff284a3e20U.jpg_300x300.jpg" alt="Transporte" class="rounded" style="width: 120px;">
                </div>
                <div>
                    <h5 class="card-title text-primary">Transporte <i class="fas fa-bus"></i></h5>
                    <p class="card-text"><strong>Transporte público:</strong> 6-10 Bs en trufis y micros.</p>
                    <p><strong>Vehículo propio:</strong> Recomendado 4x4 de mayo a octubre.</p>
                </div>
            </div>
        </div>

        <!-- Sección de Actividades -->
        <div class="col-md-12 mt-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary display-4">Actividades <i class="fas fa-bus"></i></h5>
                    <div class="gallery-container d-flex flex-wrap">
                        <div class="gallery-item">
                            <img src="https://gmsantacruz.gob.bo/Noticias/imagenes/IMG-20240602-WA0029-860x484.jpg" alt="El Curiche" class="img-fluid rounded">
                            <h6 class="mt-2 text-dark">El Curiche</h6>
                            <p class="text-muted">Observación de aves y plantas autóctonas en un humedal tropical.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="https://www.ishikulemu.cl/wp-content/uploads/2021/12/20211201_192549.png" alt="Senderos de interpretación" class="img-fluid rounded">
                            <h6 class="mt-2 text-dark">Senderos de interpretación</h6>
                            <p class="text-muted">Caminatas guiadas con explicación sobre flora, fauna, y cultura local.</p>
                        </div>
                        <div class="gallery-item">
                            <img src="https://www.lostiempos.com/sites/default/files/styles/noticia_detalle/public/media_imagen/2020/11/26/12_me_2_lopezzzzz.jpg?itok=KGEnGzS1" alt="Paseos a caballo" class="img-fluid rounded">
                            <h6 class="mt-2 text-dark">Paseos a caballo</h6>
                            <p class="text-muted">Explora el entorno en paseos a caballo guiados por locales.</p>
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
                                <img src="https://media.revistaad.es/photos/62c6d00913030ba8bac96311/16:9/w_2560%2Cc_limit/GettyImages-1317990289.jpg?text=Ruta+{{ $ruta->nombre }}" alt="{{ $ruta->nombre }}">
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

        <!-- Sección de Contacto -->
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
    </div>
@endsection


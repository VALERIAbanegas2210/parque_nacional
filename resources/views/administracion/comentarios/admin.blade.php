<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Comentarios</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Panel de Administración - Gestión de Comentarios</h1>
    </header>

    <main>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Listado de Comentarios -->
        @foreach ($comentarios as $comentario)
            <div>
                <h3>{{ $comentario->usuario->name }} comentó:</h3>
                <p>{{ $comentario->descripcion }}</p>
                <p>Puntuación: 
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $comentario->puntuacion)
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </p>
                @if ($comentario->imagen)
                    <img src="{{ asset('storage/' . $comentario->imagen) }}" alt="Imagen del comentario" width="100">
                @endif

                <!-- Botón para eliminar el comentario -->
                <form action="{{ route('admin.comentarios.destroy', $comentario) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
            <hr>
        @endforeach
    </main>

    <footer>
        <p>© 2023 Parque Nacional</p>
    </footer>
</body>
</html>

@extends('layouts.admin_template')

@section('header2')
    <title>Comunidades</title>
@endsection

@section('header')
    <div class="pagetitle">
        <h1>Comunidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('layouts.admin_template') }}">Home</a></li>
                <li class="breadcrumb-item">Administración</li>
                <li class="breadcrumb-item active">Comunidades</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection

@section('content')
    @if (session('success'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert"
            style="position: fixed; top: 20px; right: 20px; z-index: 1050; width: 250px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Lista de Comunidades</h5>

                        </div>

                        <!-- Tabla con botones de editar y eliminar en la columna Acción -->
                        <table class="table table-hover table-striped table-bordered text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Zona</th>
                                    <th scope="col">Actualizado</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comunidades as $comunidad)
                                    <tr>
                                        <td scope="row">{{ $comunidad->id }}</td>
                                        <td>{{ $comunidad->nombre }}</td>
                                        <td>{{ $comunidad->descripcion }}</td>
                                        <td>{{ $comunidad->zona }}</td>
                                        <td>{{ $comunidad->updated_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" title="Editar Entrada"
                                                data-bs-toggle="modal" data-bs-target="#editRoleModal-{{ $comunidad->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>



                                            <!-- Modal de editar -->
                                            <div class="modal fade" id="editRoleModal-{{ $comunidad->id }}" tabindex="-1"
                                                aria-labelledby="editRoleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editRoleModalLabel">Editar Comunidad
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('admin.comunidades.update', $comunidad->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="nombre" class="form-label">Nombre de
                                                                        Comunidad</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nombre" name="nombre"
                                                                        value="{{ $comunidad->nombre }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="descripcion"
                                                                        class="form-label">Descripción</label>
                                                                    <input type="text" class="form-control"
                                                                        id="descripcion" name="descripcion"
                                                                        value="{{ $comunidad->descripcion }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="zona" class="form-label">Zona</label>
                                                                    <input type="text" class="form-control"
                                                                        id="zona" name="zona"
                                                                        value="{{ $comunidad->zona }}" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-success">Actualizar
                                                                    Comunidad</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Enhanced Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

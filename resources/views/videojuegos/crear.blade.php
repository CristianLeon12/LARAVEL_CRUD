@extends('layouts.app')

@section('content')
    <!-- Sección principal: Agregar Videojuego -->
    <section class="section">
        <!-- Encabezado de la sección -->
        <div class="section-header">
            <h3 class="page__heading" style="color: #000">Agregar Videojuego</h3>
        </div>

        <!-- Cuerpo de la sección -->
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tarjeta principal -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Verificar si hay errores de validación -->
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <!-- Formulario para agregar videojuego -->
                            <form action="{{ route('videojuegos.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Campo para el nombre del videojuego -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" style="display: inline-block; color: #000; font-size: 18px;">Nombre</label>
                                            <input type="text" name="name" class="form-control" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>

                                    <!-- Campo para la categoría -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id" style="display: inline-block; color: #000; font-size: 18px;">Categoría</label>
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Campo para el estado activo -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="active" style="display: inline-block; color: #000; font-size: 18px;">Activo</label>
                                            <select name="active" class="form-control">
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Botones para guardar y cancelar -->
                                    <div class="col-md-6 mt-12" style="margin-top: auto;">
                                        <div class="form-group" style="margin-left: auto;">
                                            <button type="submit" class="btn btn-primary:hover" style="color: #ffffff; background-color: #0DC1E9; border-color: #0DC1E9; width: 100px; font-size: 16px;">Guardar</button> 
                                            <a href="{{ route('videojuegos.index') }}" class="btn btn-warning:hover" style="color: #ffffff; background-color: #F3580B; border-color: #F3580B; width: 100px; font-size: 16px;">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

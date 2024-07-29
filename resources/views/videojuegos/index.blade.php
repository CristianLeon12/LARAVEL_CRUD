@extends('layouts.app')

@section('title', 'Videojuegos')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">VIDEOJUEGOS</h1>
            <a href="{{ route('videojuegos.create') }}" class="btn btn-primary mb-3">Agregar Videojuego</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videogames as $videojuego)
                    <tr>
                        <td>{{ $videojuego->name }}</td>
                        <td>{{ $videojuego->category->name }}</td>
                        <td>{{ $videojuego->active ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('videojuegos.edit', $videojuego->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('videojuegos.destroy', $videojuego->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este videojuego?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $videogames->links() }}
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')
<h1>Lista de Productos</h1>
<a class="btn btn-success mb-3" href="{{route('productos.crear')}}">Crear Producto</a> 

    @empty($productos)
        <div class="alert alert-warning">
            La lista de productos esta vacia
        </div>
    @else
    <div class="table-responsive">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Título</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
        <th scope="col">Status</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
         <tr>
            <td>{{ $producto->id}}</td>
            <td>{{ $producto->title}}</td>
            <td>{{ $producto->description}}</td>
            <td>{{ $producto->price}}</td>
            <td>{{ $producto->stock}}</td>
            <td>{{ $producto->status}}</td>
            <td>
                <a class="btn btn-link" href="{{ route('productos.mostrar', ['producto' => $producto->id]) }}">Mostrar</a> 
                <a class="btn btn-link" href="{{ route('productos.editar', ['producto' => $producto->id]) }}">Editar</a> 
                <form method="POST" class="d-inline" action="{{ route('productos.eliminar', ['producto' => $producto->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link">Borrar</button>            
                </form>
            </td>
         </tr>   
        @endforeach
    </tbody>
    </table>
    </div>
    @endempty
@endsection
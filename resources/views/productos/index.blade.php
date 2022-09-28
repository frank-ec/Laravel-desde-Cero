@extends('layouts.master')

@section('content')
<h1>Lista de Productos</h1>
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
         </tr>   
        @endforeach
    </tbody>
    </table>
    </div>
    @endempty
@endsection
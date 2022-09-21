@extends('layouts.master')

@section('content')
<h1>Lista de Productos</h1>
    @empty($products)
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
        @foreach ($products as $product)
         <tr>
            <td>{{ $product->id}}</td>
            <td>{{ $product->title}}</td>
            <td>{{ $product->description}}</td>
            <td>{{ $product->price}}</td>
            <td>{{ $product->stock}}</td>
            <td>{{ $product->status}}</td>
         </tr>   
        @endforeach
    </tbody>
    </table>
    </div>
    @endempty
@endsection
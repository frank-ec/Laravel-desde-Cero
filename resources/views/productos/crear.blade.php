@extends('layouts.master')
@section('content')

    <h1>Creación de Productos</h1>
    <form method="POST" action="{{route('productos.tienda')}}" >
        @csrf
        <div class="form-row">
            <label>Title</label>
            <input class="form-control" type="text" name="title" required>
         
        </div>
        <div class="form-row">
            <label>Description</label>
            <input class="form-control" type="text" name="description" required>
        </div>
        <div class="form-row">
            <label>Price</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price" required>
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input class="form-control" type="number" min="0" name="stock" required>
        </div>
        <div class="form-row">
            <label>Status</label>
            <select class="custom-select" name="status" required>
                <option value="" selected>Seleccione...</option>
                <option value="available" selected>Available</option>
                <option value="unavailable" selected>Unavailable</option>
            </select>    
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Crear Producto</button>            
        </div>

    </form>

@endsection    

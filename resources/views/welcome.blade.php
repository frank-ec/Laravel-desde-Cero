@extends('layouts.app')
@section('content')
    <h1>Welcome</h1>
    @empty($productos)
        <div class="alert alert-danger">
            La lista de productos esta vacia
        </div>
    @else
        <div class="row">
            @foreach ($productos as $producto )
                <div class="col-3"> 
                    @include('components/product-card')
                </div>
            @endforeach
        </div>
    @endempty
   
@endsection    
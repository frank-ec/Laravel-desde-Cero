@extends('layouts.app')
@section('content')

    <h1>{{$producto->title}} ({{$producto->id}})</h1>
    <p>{{$producto->description}}</p>
    <p>{{$producto->price}}</p>
    <p>{{$producto->stock}}</p>
    <p>{{$producto->status}}</p>

    {!!$html!!}
    
    {{-- $html --}}
@endsection    

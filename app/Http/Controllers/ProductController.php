<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('productos.index');     // Vista index dentro de la carpeta productos
    }
    public function crear()
    {
        return '<h1> Creación de productos desde el CONTROLADOR</h1>';
    }
    public function tienda()
    {
        //
    }
    public function mostrar($producto)
    {
        return view('productos.mostrar');       // Vista mostart de la carpeta productos
    }

    public function editar($producto)
    {
        return "<h1>Producto a editar desde el CONTROLADOR {$producto}</h1>";
    }
    public function actualizar($producto)
    {
       //
    }
    public function eliminar($producto)
    {
       //
    }

}

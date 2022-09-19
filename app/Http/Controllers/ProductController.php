<?php

namespace App\Http\Controllers;

use App\Models\Product;             // Importar desde el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        
        // $products  = DB::table('products')->get(); //Query Builder
        //dd($products );

        $products = Product::all();
        //return $products;       // Retona un Json
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
        // $product  = DB::table('products')->where('id', $producto)->get();    //Query Builder
        // $product  = DB::table('products')->where('id', $producto)->first();  //Query Builder
        // $product  = DB::table('products')->find($producto);                  //Query Builder
       //  dd($product );
       // $product = Product::find($producto); // Muestra nulo si no lo encuentra
       $product = Product::findOrFail($producto); // Muestra erro 404 Not Found
       // dd($product );
       // return $product;       // Retona un Json
     
        return view('productos.mostrar')->with([
                'product' => $product,
                'html' => "<h2> Agregando HTML desde el controlador</h2>",

        ]);       // Vista mostart de la carpeta productos
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

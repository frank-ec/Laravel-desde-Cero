<?php

namespace App\Http\Controllers;

use App\Models\Product;             // Importar desde el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {   // $products  = DB::table('products')->get(); //Query Builder
        //dd($products );

        // $products = Product::all();
        //return $products;       // Retona un Json
        return view('productos.index')->with([
            'products' => Product::all(),
          //  'products' => [], // array vacio
        ]);     // Vista index dentro de la carpeta productos
    }
    public function crear()
    {
        return  view('productos.crear');
    }
    public function tienda()
    {
        // dd('Estamos en la tienda');
        /* Una a una las propiedades
        $product = Product::create([
              'title' => request()->title,
              'description' => request()->description,    
              'price' => request()->price,    
              'stock' => request()->stock,    
              'status' => request()->status,    
        ]); */
        $product =  Product::create(request()->all()); // Recibe todos los atributos
        return $product;
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
    {   // Route::get('productos/{producto}/editar', 'ProductController@editar')->name('productos.editar');
        return view('productos.editar')->with([
            'producto' => Product::findOrFail($producto),
        ]);
    }
    public function actualizar($producto)
    {
       dd('En update');
    }
    public function eliminar($producto)
    {
       //
    }

}

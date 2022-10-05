<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;             // Importar desde el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Si no inicia sesion redirecciona
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {   
        return view('productos.index')->with([
            'productos' => Product::all(),
        ]);     // Vista index dentro de la carpeta productos
    }
    public function crear()
    {
        return  view('productos.crear');
    }

    public function tienda(ProductRequest $request)
    {
        $producto =  Product::create($request->validated()); // Recibe todos los atributos
        
        return redirect()
            ->route('productos.index')
            ->withSuccess("Producto {$producto->id} {$producto->title} fue agregado correctamente .. :)");

    }
    public function mostrar(Product $producto)
    {
     
        return view('productos.mostrar')->with([
                'producto' => $producto,
                'html' => "<h2> Agregando HTML desde el controlador</h2>",

        ]);       // Vista mostart de la carpeta productos
    }

    public function editar(Product $producto)
    {   
        return view('productos.editar')->with([
            'producto' => $producto,
        ]);
    }

    public function actualizar(ProductRequest $request,Product $producto)
    {
            $producto->update($request->validated());
            
            return redirect()
                ->route('productos.index')
                ->withSuccess("Producto {$producto->id} {$producto->title} fue actualizado correctamente .. :)");
    }
    public function eliminar(Product $producto)
    {
         $producto->delete();
         return redirect()
        ->route('productos.index')
        ->withSuccess("Producto {$producto->id} {$producto->title} fue eliminado correctamente .. :)");
    }

}

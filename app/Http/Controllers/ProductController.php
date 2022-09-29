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
            'productos' => Product::all(),
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
        //Validaciones
            $rules = [
                'title' => ['required','max:255'],
                'description' => ['required','max:1000'],
                'price' => ['required','min:1'],
                'stock' => ['required','min:0'],
                'status' => ['required','in:available,unavailable'],
            ]; 
            request()->validate($rules);
        // Manejo de errores con sesion , Validando en la creacion de producto
            if(request()->status =='available' && request()->stock == 0){
                // session()->put('error','No puede asignar como disponible a un producto con stock cero');
                session()->flash('error','No puede asignar como disponible a un producto con stock cero');
                return redirect()
                ->back()
                ->withInput(request()->all());
            }
            session()->forget('error');
        $producto =  Product::create(request()->all()); // Recibe todos los atributos
        //return redirect()->back();
        //return redirect()->action('MainController@index');
        return redirect()->route('productos.index');

    }
    public function mostrar($producto)
    {
        // $product  = DB::table('products')->where('id', $producto)->get();    //Query Builder
        // $product  = DB::table('products')->where('id', $producto)->first();  //Query Builder
        // $product  = DB::table('products')->find($producto);                  //Query Builder
       //  dd($product );
       // $product = Product::find($producto); // Muestra nulo si no lo encuentra
       $producto = Product::findOrFail($producto); // Muestra erro 404 Not Found
       // dd($product );
       // return $product;       // Retona un Json
     
        return view('productos.mostrar')->with([
                'producto' => $producto,
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
        //Validaciones
        $rules = [
            'title' => ['required','max:255'],
            'description' => ['required','max:1000'],
            'price' => ['required','min:1'],
            'stock' => ['required','min:0'],
            'status' => ['required','in:available,unavailable'],
        ];  
        request()->validate($rules);

            $producto = Product::findOrFail($producto);
            $producto->update(request()->all());
            return redirect()->route('productos.index');
        
    }
    public function eliminar($producto)
    {
        $producto = Product::findOrFail($producto);
        $producto->delete();
        //return $producto;
        return redirect()->route('productos.index');

    }

}

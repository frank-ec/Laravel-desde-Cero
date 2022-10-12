<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome')->with([
            'productos'=> Product::all(),
        ]);     // Vista welcome del controlador principal
    }
}


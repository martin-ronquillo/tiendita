<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\Provincia;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias = Categoria::all();

        return view('home', compact('categorias'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|min:3',
        ]);

        $busqueda = $request->search;

        return view('searchResults', compact('busqueda'));
    }

    public function searchCategorie(Request $request)
    {
        $busqueda = $request->search;

        return view('categoriesResults', compact('busqueda'));
    }
}

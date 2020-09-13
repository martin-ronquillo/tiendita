<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;

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
        $busqueda = $request->search;
        $results = Producto::where('name', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('caracteristicas', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('categoria_id', $request->search)
                            ->get();

        return view('searchResults', compact('results', 'busqueda'));
    }
}

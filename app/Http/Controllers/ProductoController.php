<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Opinion;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::Findorfail(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    
    public function show(Producto $producto)
    {
        $positivo = 0;
        $negativo = 0;
        $neutral = 0;

        $calificaciones = Opinion::where('user_id', $producto->ventas->first()->users->id)->get();

        foreach ($calificaciones as $key) {

            if ($key->tipo === 'Positivo') {
                $positivo+= 1;
            }
            if ($key->tipo === 'Negativo') {
                $negativo+= 1;
            }
            if ($key->tipo === 'Neutral') {
                $neutral+= 1;
            }

        }

        if ($calificaciones->count() > 0) {
            $promedioPosi = ($positivo/$calificaciones->count()) * 100;
            $promedioNega = ($negativo/$calificaciones->count()) * 100;
            $promedioNeut = ($neutral/$calificaciones->count()) * 100;
            $recomendado = round($promedioPosi);

            if($promedioPosi > $promedioNega && $promedioPosi > $promedioNeut){

                return view('productos.show', compact('producto', 'promedioPosi', 'recomendado'));

            }

            if($promedioNega > $promedioPosi && $promedioNega > $promedioNeut){

                return view('productos.show', compact('producto', 'promedioNega', 'recomendado'));

            }

            if($promedioNeut > $promedioNega && $promedioNeut > $promedioPosi){

                return view('productos.show', compact('producto', 'promedioNeut', 'recomendado'));

            }
            
            if ($promedioPosi == $promedioNega 
                && $promedioPosi == $promedioNeut
                && $promedioNeut == $promedioNega) {

                    return view('productos.show', compact('producto', 'promedioNeut', 'recomendado'));
            }
        }
        else{
            return view('productos.show', compact('producto'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}

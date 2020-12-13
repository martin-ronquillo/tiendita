<?php

namespace App\Http\Controllers;

use App\Opinion;
use App\Transaccion;
use App\Compra;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $transaccion = Transaccion::where('id', $request->user)->first();
        $compras = Compra::where('user_id', Auth::user()->id)->get();
        $opinion = new Opinion();

        if ($request->opinion == Null) {

            $danger = "La opinion no puede estar vacia";
            return view('compras.show', compact('compras', 'danger'));

        }

        //Almacena la opinion
        $opinion->opinion = $request->opinion;
        $opinion->tipo = $request->tipo_usuario;
        $opinion->aporta_id = Auth::user()->id;
        $opinion->user_id = $request->user_opinion;

        $opinion->save();
        //Cambia el estado de la transaccion
        $transaccion->estado = $request->confirmacion;
        $transaccion->confirmacion = Carbon::now();

        $transaccion->save();

        $show_ventas = '';
        $show_compras = ' show';
        $show_configuracion = '';
        $selected1 = 'black';

        return view('compras.show', compact('compras', 'show_ventas', 'show_compras', 'show_configuracion', 'selected1'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function show(Opinion $opinion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opinion $opinion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinion $opinion)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Transaccion;
use App\Producto;
use App\Compra;
use App\Venta;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaccionController extends Controller
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
    public function confirmaMetodos(Request $request){

        $producto = $request->producto;
        $cantidad = $request->cantidad;

        return view('compras.confirma-metodos', compact('producto', 'cantidad'));
    }

    public function revisaMetodos(Request $request){

        $producto = Producto::where('id', $request->producto)->first();
        $cantidad = $request->cantidad;

        return view('compras.revisa-confirma', compact('producto', 'cantidad'));
    }

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
        //Genera id aleatorio
        $codigo_compra = rand(100000, 9999999);
        $codigo_transaccion = rand(100000, 9999999);
        //Busca los datos necesarios
        $producto = Producto::where('id', $request->producto)->first();
        $venta = Venta::where('producto_id', $producto->id)->first();
        //
        
        //Se crea y se guarda la compra con los datos recibidos
        if ($producto->stock < intval($request->cantidad)) {
            $danger = "La cantidad de unidades proporcionada para ".$producto->name." no esta disponible";
            $categorias = Categoria::all();
            return view('home', compact('categorias', 'danger'));
        }
        
        $compra = new Compra();

        $compra->id = $codigo_compra;
        $compra->producto_id = $producto->id;
        $compra->user_id = Auth::user()->id;
        $compra->cantidad = $request->cantidad;
        $compra->precio_envio = $producto->ventas->first()->precio_envio;
        $compra->tot_compra = $producto->precio * $request->cantidad + $producto->ventas->first()->precio_envio;

        $compra->save();
        //Resta la cantidad de productos vendidas del stock del producto
        $producto->stock = $producto->stock - intval($request->cantidad);

        $producto->save();
        //Si el producto ya no tiene stock, la venta se finaliza
        if ($producto->stock <= 0) {
            $venta->estado = 'vendido';
            $venta->venta_fin = Carbon::now();
            
            $venta->save();
        }

        //Se crea y se guarda la transaccion con los datos recibidos

        $transaccion = New Transaccion();

        $transaccion->id = $codigo_transaccion;
        $transaccion->compra_id = $codigo_compra;
        $transaccion->venta_id = $venta->id;
        $transaccion->pago_id = $venta->pago_id;
        $transaccion->envio_id = $venta->envio_id;

        $transaccion->save();

        return view('compras.ya-casi', compact('producto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function show(Transaccion $transaccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaccion $transaccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaccion $transaccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaccion $transaccion)
    {
        //
    }
}

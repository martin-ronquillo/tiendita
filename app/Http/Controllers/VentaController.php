<?php

namespace App\Http\Controllers;

use App\Image;
use App\Venta;
use App\Producto;
use App\Categoria;
use App\Pregunta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VentaController extends Controller
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
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $codigo_producto = rand(100000, 9999999);
        $codigo_venta = rand(100000, 9999999);
        //Se crea y se guarda el producto con los datos recibidos
        $producto = New Producto();

        $producto->id = $codigo_producto;
        $producto->name = $request->nombre_producto;
        $producto->caracteristicas = $request->caracteristicas;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->estado = $request->condicion;
        $producto->categoria_id = $request->categoria;

        $producto->save();

        //Se crea y se guarda la venta con los datos recibidos

        $venta = New Venta();

        $venta->id = $codigo_venta;
        $venta->estado = 'activo';
        $venta->producto_id = $codigo_producto;
        $venta->user_id = Auth::user()->id;
        $venta->pago_id = $request->pago;
        $venta->envio_id = $request->envio;
        $venta->precio_envio = $request->precio_envio;

        $venta->save();

        //Se consulta el producto recien creado para retornar su "Show"

        $producto = Producto::findOrFail($codigo_producto);
        $producto = $producto->id;

        return redirect()->route('ventas.images', compact('producto'));
    }

    public function images($producto){
        return view('ventas.images', compact('producto'));
    }

    //Sube las imagenes del Dropzone mediante Ajax, por eso no retorna
    public function storeImages(Request $request){
        $request->validate([
            'file' => 'required|image|max:5120',
            'producto' => 'required|exists:productos,id',
        ]);

        $images = $request->file('file')->store('public/imagenes');

        $url = Storage::url($images);
        $producto = $request->producto;

        Image::create([
            'url' => $url,
            'producto_id' => $producto
        ]);
    }

    public function deshabilitarVenta(Request $request){
        $venta = Venta::where('producto_id', $request->producto)->first();

        $venta->estado = 'suspendido';

        $venta->save();

        $categorias = Categoria::all();

        return view('home', compact('categorias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta, $id)
    {
        $ventas = Venta::where('user_id', $id)->get();
        $show_ventas = ' show';
        $show_compras = '';
        $show_configuracion = '';
        $selected5 = 'black';

        return view('ventas.show', compact('ventas', 'show_ventas', 'show_compras', 'show_configuracion', 'selected5'));
    }

    public function resumen($id)
    {
        $ventas = Venta::where('user_id', $id)->get();
        $user = User::findOrFail(Auth::user()->id);
        $show_ventas = ' show';
        $show_compras = '';
        $show_configuracion = '';
        $selected4 = 'black';

        return view('ventas.resumen', compact('ventas', 'user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected4'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}

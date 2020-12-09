<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function datos(User $user)
    {
        $show_ventas = '';
        $show_compras = '';
        $show_configuracion = ' show';
        $selected8 = 'black';

        return view('user.datos', compact('user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected8'));
    }

    public function seguridad(User $user)
    {
        $show_ventas = '';
        $show_compras = '';
        $show_configuracion = ' show';
        $selected9 = 'black';

        return view('user.seguridad', compact('user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected9'));
    }

    public function editEmail()
    {
        return view('user.editEmail');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if ($request->email === $request->reemail && $request->email && $request->reemail) {

            $user->email = $request->email;
            $user->save();
            $success = 'Email actualizado correctamente';
            $show_ventas = '';
            $show_compras = '';
            $show_configuracion = ' show';
            $selected8 = 'black';
    
            return view('user.datos', compact('user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected8', 'success'));

        }else{

            $danger = 'Los correos no coinciden';
            $show_ventas = '';
            $show_compras = '';
            $show_configuracion = ' show';
            $selected8 = 'black';
    
            return view('user.datos', compact('user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected8', 'danger'));

        }

    }

    public function editClave()
    {
        return view('user.editClave');
    }

    public function updateClave(Request $request)
    {
        $request->validate([
            'clave' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->password = bcrypt($request->clave);
        $user->save();
        $success = 'Datos actualizados correctamente';
        $show_ventas = '';
        $show_compras = '';
        $show_configuracion = ' show';
        $selected8 = 'black';
    
        return view('user.datos', compact('user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected8', 'success'));
    }

    public function editName(User $user)
    {
        return view('user.editName', compact('user'));
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:25'],
            'apellido_paterno' => 'required', 'string', 'max:25',
            'apellido_materno' => 'required', 'string', 'max:25',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->name = $request->nombre;
        $user->apellido_pater = $request->apellido_paterno;
        $user->apellido_mater = $request->apellido_materno;
        $user->save();
        $success = 'Datos actualizados correctamente';
        $show_ventas = '';
        $show_compras = '';
        $show_configuracion = ' show';
        $selected8 = 'black';
    
        return view('user.datos', compact('user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected8', 'success'));
    }

    public function editCedula(User $user)
    {
        return view('user.editCedula', compact('user'));
    }

    public function updateCedula(Request $request)
    {
        $request->validate([
            'cedula' => 'required|digits:10|unique:users,cedula',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->cedula = $request->cedula;
        $user->save();
        $success = 'Datos actualizados correctamente';
        $show_ventas = '';
        $show_compras = '';
        $show_configuracion = ' show';
        $selected8 = 'black';
    
        return view('user.datos', compact('user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected8', 'success'));
    }

    public function editTelefono(User $user)
    {
        return view('user.editTelefono', compact('user'));
    }

    public function updateTelefono(Request $request)
    {
        $request->validate([
            'telefono' => 'digits_between:7,10',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->tlf = $request->telefono;
        $user->save();
        $success = 'Datos actualizados correctamente';
        $show_ventas = '';
        $show_compras = '';
        $show_configuracion = ' show';
        $selected8 = 'black';
    
        return view('user.datos', compact('user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected8', 'success'));
    }

    public function editDireccion(User $user)
    {
        return view('user.editDireccion', compact('user'));
    }

    public function updateDireccion(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:250',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->direc = $request->direccion;
        $user->save();
        $success = 'Datos actualizados correctamente';
        $show_ventas = '';
        $show_compras = '';
        $show_configuracion = ' show';
        $selected8 = 'black';
    
        return view('user.datos', compact('user', 'show_ventas', 'show_compras', 'show_configuracion', 'selected8', 'success'));
    }
}

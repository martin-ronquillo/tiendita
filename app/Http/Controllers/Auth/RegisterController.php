<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cedula' => 'required|digits:10|unique:users,cedula',
            'name' => ['required', 'string', 'max:25'],
            'apellido_paterno' => 'required', 'string', 'max:25',
            'apellido_materno' => 'required', 'string', 'max:25',
            'provincia' => 'required|exists:provincias,id',
            'telefono' => 'digits_between:7,10',
            'direccion_domiciliaria' => 'required|string|max:250',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $token = Str::random(60);

        return User::create([
            'cedula' => $data['cedula'],
            'name' => $data['name'],
            'apellido_pater' => $data['apellido_paterno'],
            'apellido_mater' => $data['apellido_materno'],
            'provincia_id' => $data['provincia'],
            'tlf' => $data['telefono'],
            'direc' => $data['direccion_domiciliaria'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Hash('sha256', $token),
        ]);
    }
}

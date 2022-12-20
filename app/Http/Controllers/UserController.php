<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        //
    }


    public function register()
    {
        return view('auth.register');
    }

    public function registerVerify(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'identification' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'password_confirm' => 'required|same:password',

        ], [
            'name.required' => 'los nombres son requeridos',
            'lastname.required' => 'los apellidos son requeridos',
            'city.required' => 'la  ciudad es requerida',
            'address.required' => 'la  direccion es requerida',
            'phone.required' => 'el numero de celular es requerida',
            'identification.required' => 'la  identificacion es requerida',
            'email.required' => 'el correo es requerido',
            'password.required' => 'la  contraseña  es requerida',
            'password.required' => 'la confirmacion de  contraseña  es requerida',
            'email.unique' => 'el correo ya ha sido usado'

        ]);

        $user = new User([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'identification' => $request->identification,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');

        $user = new User([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'identification' => $request->identification,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
    }

    public function login()
    {

        return view('auth.login');
    }

    public function loginVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'el correo es requerido',
            'password.required' => 'el contraseña es requerida'


        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('Inicio');
        }

        return back()->withErrors(['Invalid_credentials' => 'usuario o contraseña incorrecta']);

        return back()->withErrors(['Invalid_credentials' => 'usuario o contraseña incorrecta']);
    }

    public function password()
    {

        return view('auth.password');
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
            'new_password_confirm' => 'required|same:new_password',
        ], [
            'old_password.required' => 'la anterior contraseña es requerida',
            'new_password.required' => 'la nueva contraseña es requerida',
            'new_password_confirm' => 'confirmar la nueva contraseña',

        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'la contraseña fue cambiada!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

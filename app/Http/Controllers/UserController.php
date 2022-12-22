<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
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

        $this->validateInputs($request);
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
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);

        return view('auth.profile', ['user' => $user]);
    }

    public function profileUpdate(Request $request, $id)
    {
        $userActuality = User::findOrFail($id);
        $this->validateInputs($request);
        $userActuality->name = $request->name;
        $userActuality->lastname = $request->lastname;
        $userActuality->city = $request->city;
        $userActuality->address = $request->address;
        $userActuality->phone = $request->phone;
        $userActuality->identification = $request->identification;
       // $userActuality->email = $request->email;

        $userActuality->save();
        return redirect()->route('profile', $id)->with('success', 'Usuario actualizado correctamente');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function validateInputs($payload)
    {
        $payload->validate([
            'name' => 'required',
            'lastname' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'identification' => 'required',
            'email' => 'required|unique:users,email'.$payload->id,
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
            'password_confirm.required' => 'la confirmacion de  contraseña  es requerida',
            'email.unique' => 'el correo ya ha sido usado'

        ]);
    }
}

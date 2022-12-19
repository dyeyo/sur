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
      $data['title']='register';
     return view('auth.register',$data);
    }

    public function registerVerify(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' =>'required',
            'city'=>'required',
            'address' => 'required|min:10',
            'phone' => 'required|min:10',
            'identification'=>'required',
            'email'=> 'required|unique:users,email',
            'password'=>'required',
            'password_confirm' =>'required|same:password',
            
         ]);

         $user = new User([
            'name' => $request ->name,
            'lastname' => $request ->lastname,
            'city' => $request ->city,
            'address'=> $request ->address,
            'phone'=> $request ->phone,
            'identification'=> $request ->identification,
            'email'=> $request ->email,
            'password' => Hash::make($request ->password),
         ]);

         $user->save();
         return redirect()->route('login')->with('success','Usuario registrado correctamente');

    }
    
    public function login()
    {
      $data['title'] = 'Login';
       return view('auth.login');
    }

    public function loginVerify(Request $request)
    {
       $request ->validate([
                'email'=>'required|email',
                'password'=>'required|min:4'
       ]);

       if(Auth::attempt(['email'=>$request->email, 'password'=> $request->password])){
            $request->session()->regenerate();
            return redirect()->route(dashboard);
       }

       return back()->withErrors(['Invalid_credentials'=>'usuario o contraseña incorrecta']);

    }
    
    public function password()
    {
        $data['title'] = 'Change Password';
        return view('auth.password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}



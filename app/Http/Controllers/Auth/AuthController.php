<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
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
    public function registerUser(){
        $user_types = user_types::all();
        return view('Auth.user', compact('user_types') );
    }
    public function register(){
        return view('Auth.registro');
    }
    public function login(){
        return view('Auth.login');
    }
    public function registerVerify(Request $request){

        
        $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',
            'user_type_id' => 'required'
        ],
        [
            'email.unique' => 'El email ya está registrado.'

        ]);

        $registro = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'state_id' => 1,
            'user_type_id' => $request->user_type_id
        ]);

        
        if($request->formAdmin == 1 ){
            return redirect()->route('continuarRegistroAdmin')->with('id', $registro->id, 'user_type_id', $registro->user_type_id);
        }else{
            return redirect()->route('continuarRegistro')->with('id', $registro->id, 'user_type_id', $registro->user_type_id);
        }
        
    }


    public function loginVerify(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password, 'user_type_id' => 1])){
            return view('admin.admin');
        }elseif(Auth::attempt(['email'=> $request->email, 'password' => $request->password, 'user_type_id' => 2]) or Auth::attempt(['email'=> $request->email, 'password' => $request->password, 'user_type_id' => 3])){
            return redirect()->route('products.index');
        }
        return back()->withErrors(['invalid_credentials'=> 'Usuario o Contraseña no valida'])->withInput();
    }



    public function continuarRegistro(){
        $id = User::all();
        return view('Auth.continuarRegistro');
    }

    public function continuarRegistroAdmin(){
        $id = User::all();
        return view('Auth.continuarRegistroAdmin');
    }
    
    public function signOut(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'session cerrada correctamente');
    }

    public function destroyUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }
    
}

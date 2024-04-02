<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;


class ContactanosController extends Controller
{
    //
    public function index(){
        // return view('email.contactanos');
    }


    public function store(Request $request){
        
        
        $rules = [
            'nombre' =>['required'],
            'correo' =>['required'],
            'mensaje' =>['required', 'max:200']
        ];

        $customMessages = [
            'nombre.required' => 'Este campo es obligatorio',
            'correo.required' => 'Este campo es obligatorio',
            'mensaje.required' => 'Este campo es obligatorio',
            'mensaje.max' => 'El mensaje no puede tener más de 200 caracteres '

        ];
        $datos = $request->validate($rules, $customMessages);

        $correo = ($request->all());
        Mail::to('yudyrh17@gmail.com')->send(new ContactanosMailable($datos));

        return redirect('/')->with('enviar', 'ok');
    }
}

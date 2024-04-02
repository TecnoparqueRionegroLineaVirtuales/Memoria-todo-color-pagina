<?php

namespace App\Http\Controllers;
use App\Models\data_users;
use App\Models\user_types;
use Illuminate\Http\Request;

class UserTypesController extends Controller
{
    
    public function index()
    {
       $user_types = user_types::all();
       $user_types = user_types::paginate(10);
        return View('user_types.consult', ['user_types' => $user_types]);
        
    }


    public function indexUsers()
    {
       $data_users = data_users::all();
       
        return View('user_types.consultaUsuarios', compact('data_users'));
        
    }


    public function create(){
        return View('user_types.register');
    }


    public function store(Request $request)
    {
        user_types::create([
            'description' => $request->description
        ]);
        

        return redirect()->route('user_types')->with('success', 'Rol registrado Correctamente');
    }


    public function consult(){
        return View('user_types.consult');
    }


    public function edit(user_types $id){
        return view('user_types.Edit', compact('id'));
    }


    public function update(Request $request, $id){
        $id = user_types::findOrFail($id);
        $data = $request->only('description');

        $id->update($data);
        return redirect()->route('user_types')->with('success', 'Rol actualizado');
    }

    
    
    public function destroy($id){
        $user_types = user_types::findOrFail($id);
        $user_types->delete();
        return redirect()->back()->with('success', 'Categoría eliminada correctamente.');
        
    }
}

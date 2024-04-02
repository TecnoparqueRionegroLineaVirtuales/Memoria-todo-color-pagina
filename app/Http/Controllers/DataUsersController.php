<?php

namespace App\Http\Controllers;

use App\Models\data_users;
use App\Models\user_types;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataUsersController extends Controller
{
    
    public function store(Request $request)
    {
        $files = $request->file('profile');
        $url = '';

        if ($files != null){
            $route = $files->storeAs('public/img', $files->getClientOriginalName());
            $url = Storage::url($route);
        } else if ($files == null){
            $url = null;
        }

        data_users::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'biography' => "sin biografia",
            'user_id' => $request->id_user,
            'file' => $url,
        ]);
        
    
        return redirect()->route('login')->with('success', 'Usuario registrado Correctamente');
        
        
    }

    public function storeAdmin(Request $request)
    {
        $files = $request->file('profile');
        $url = '';

        if ($files != null){
            $route = $files->storeAs('public/img', $files->getClientOriginalName());
            $url = Storage::url($route);
        } else if ($files == null){
            $url = null;
        }

        data_users::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'biography' => "sin biografia",
            'user_id' => $request->id_user,
            'file' => $url,
        ]);
        
    
        return redirect()->route('data_users_consult')->with('success', 'Usuario registrado Correctamente');
    }

    public function editUsers(User $user){
        $user_types = user_types::all();
        $State = State::all();
        $data_user = data_users::all();
        return view('user_types.editUsers', compact('user', 'user_types', 'State', 'data_user'));
    }
    
    public function updateDataUsers(Request $request, $userId, $dataUserId)
    {
        // Actualizar los datos en la tabla 'data_users'
        $data = data_users::find($dataUserId);
        $data->name = $request->input('name');
        $data->last_name = $request->input('last_name');
        $data->gender = $request->input('gender');
        $data->phone = $request->input('phone');
        $data->biography = $request->input('biography');
        $data->save();

        // Actualizar los datos en la tabla 'users'
        $user = User::find($userId);
        $user->email = $request->input('email');
        $user->state_id = $request->input('state_id');
        $user->user_type_id = $request->input('user_type_id');
        // Actualizar otros campos en la tabla 'users'
        $user->save();

        // Redirigir al usuario a la página de detalles del usuario
        return redirect()->route('data_users_consult')->with('success', 'Usuario actualizado Correctamente');
    }


   
    
}

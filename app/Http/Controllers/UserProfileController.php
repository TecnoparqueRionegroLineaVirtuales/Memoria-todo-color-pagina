<?php

namespace App\Http\Controllers;

use App\Models\data_users;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function edit(User $user){
        $data_user = data_users::where('user_id', Auth::user()->id)->get();
        $facebook = SocialLink::where('social_type_id', 1)->where('user_id', Auth::user()->id)->first();
        $youtube = SocialLink::where('social_type_id', 2)->where('user_id', Auth::user()->id)->first();
        $instagram = SocialLink::where('social_type_id', 3)->where('user_id', Auth::user()->id)->first();
        $twitter = SocialLink::where('social_type_id', 4)->where('user_id', Auth::user()->id)->first();
        
        return view('user_profile.edit', compact('user', 'data_user', 'facebook', 'youtube', 'instagram', 'twitter'));
    }
    
    public function update(Request $request, User $user){
        $files = $request->file('profile');
        $data_user = data_users::where('user_id', $user->id)->first();
        $url = '';

        if ($data_user->file != null) {
            $url = $data_user->file;
        } else if ($files != null){
            $route = $files->storeAs('public/img', $files->getClientOriginalName());
            $url = Storage::url($route);
        } else if ($files == null){
            $url = null;
        }

        $rules = [
            'name' => ['required', 'max:45'],
            'last_name' => ['required'],
            'phone' => ['required'],
        ];

        $customMessages = [
            'name.required' => 'Este campo es obligatorio',
            'name.max' => 'El nombre no puede tener más de 45 caracteres',
            'last_name.required' => 'Este campo es obligatorio',
            'phone.required' => 'Este campo es obligatorio',
        ];

        $request->validate($rules, $customMessages);

        data_users::updateOrCreate([
            'user_id' => Auth::user()->id
        ], 
        [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'biography' => $request->biography,
            'file' => $url,
        ]);

        for($i = 0; $i < 4; $i++){
            switch ($i){
                case 0:
                    if ($request->facebook == null) {
                        break;
                    } else {
                        SocialLink::updateOrCreate([
                            'user_id' => $user->id, 'social_type_id' => 1
                        ], [
                            'link' => $request->facebook,
                            'social_type_id' => 1,
                            'user_id' => Auth::user()->id
                        ]);
                        break;
                    }

                case 1:
                    if ($request->youtube == null) {
                        break;
                    } else {
                        SocialLink::updateOrCreate([
                            'user_id' => $user->id, 'social_type_id' => 2
                        ], [
                            'link' => $request->youtube,
                            'social_type_id' => 2,
                            'user_id' => Auth::user()->id
                        ]);
                        break;
                    }
                    
                case 2:
                    if ($request->instagram == null) {
                        break;
                    } else {
                        SocialLink::updateOrCreate([
                            'user_id' => $user->id, 'social_type_id' => 3
                        ], [
                            'link' => $request->instagram,
                            'social_type_id' => 3,
                            'user_id' => Auth::user()->id
                        ]);
                        break;
                    }
                    

                case 3:
                    if ($request->twitter == null) {
                        break;
                    } else {
                        SocialLink::updateOrCreate([
                            'user_id' => $user->id, 'social_type_id' => 4
                        ], [
                            'link' => $request->twitter,
                            'social_type_id' => 4,
                            'user_id' => Auth::user()->id
                        ]);
                        break;
                    }      
            }
        }

        return redirect()->back()->with('success', 'Los datos se han actualizado correctamente');
    }
}

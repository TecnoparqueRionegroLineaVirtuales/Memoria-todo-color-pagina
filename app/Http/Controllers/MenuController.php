<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\State;
use App\Models\MenuType;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Menu::orderBy('id', 'DESC')->simplePaginate(4);
        return view('admin.menus.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states = State::all();
        $menu_types =  MenuType::all();
        return view('admin.menus.create', compact('states', 'menu_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => ['required'],
            'route' => ['required'],
            'state_id' => ['required'],
            'menu_type_id' => ['required']
        ];

        $customMessages = [
            'title.required' => 'Este campo es obligatorio',
            'route.required' => 'Este campo es obligatorio',
            'state_id.required' => 'Este campo es obligatorio',
            'menu_type_id.required' => 'Este campo es obligatorio'
        ];

        $request->validate($rules, $customMessages);

   
        $menu = new Menu();

        $menu->title = $request->title;
        $menu->route = $request->route;
        $menu->state_id = $request->state_id;
        $menu->menu_type_id = $request->menu_type_id;

        $menu->save();

        return redirect()->route('admin.menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $states = State::all();
        $menu_types = MenuType::all();
        $menu = Menu::findOrFail($id);
        return view('admin.menus.edit', compact('menu', 'states', 'menu_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //

        $rules = [
            'title' => ['required'],
            'route' => ['required'],
            'state_id' => ['required'],
            'menu_type_id' => ['required']
        ];

        $customMessages = [
            'title.required' => 'Este campo es obligatorio',
            'route.required' => 'Este campo es obligatorio',
            'state_id.required' => 'Este campo es obligatorio',
            'menu_type_id.required' => 'Este campo es obligatorio'
        ];

        $request->validate($rules, $customMessages);

        $menu->title = $request->title;
        $menu->route = $request->route;
        $menu->state_id = $request->state_id;
        $menu->menu_type_id = $request->menu_type_id;

        $menu->save();
        return redirect()->route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Menu::destroy($id);
        return redirect()->route('admin.menus.index');
    }
}

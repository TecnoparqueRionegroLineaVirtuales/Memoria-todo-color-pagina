<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Menu;

class MenuComposer
{
    public function compose (View $view){
        $menus = Menu::all();
        $view->with('menus',$menus);
    }
}


<?php

namespace Database\Seeders;
use App\Models\Menu;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inicio = new Menu();
        $inicio->title = "Inicio";
        $inicio->route = "index";
        $inicio->state_id = 1; 
        $inicio->menu_type_id = 2;
        $inicio->save();

        $murales = new Menu();
        $murales->title = "Murales";
        $murales->route = "galleries.index";
        $murales->state_id = 1; 
        $murales->menu_type_id = 1;
        $murales->save();
        
        $rutaCultural = new Menu();
        $rutaCultural->title = "Ruta cultural";
        $rutaCultural->route = "index";
        $rutaCultural->state_id = 1; 
        $rutaCultural->menu_type_id = 1;
        $rutaCultural->save();
        
        $tienda = new Menu();
        $tienda->title = "Tienda";
        $tienda->route = "products.index";
        $tienda->state_id = 1; 
        $tienda->menu_type_id = 1;
        $tienda->save();
        
        $iniciarSesion = new Menu();
        $iniciarSesion->title = "Descargar APP";
        $iniciarSesion->route = "login";
        $iniciarSesion->state_id = 1; 
        $iniciarSesion->menu_type_id = 1;
        $iniciarSesion->save();
        
        $carrito = new Menu();
        $carrito->title = "Carrito";
        $carrito->route = "index";
        $carrito->state_id = 1; 
        $carrito->menu_type_id = 1;
        $carrito->save();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;
use App\Models\Product;
use App\Models\Personalizacion; // Asegúrate de importar el modelo de Personalización si no está hecho.

class PersonalizedSaleController extends Controller
{
    /**
     * Muestra el formulario de ventas personalizadas con datos.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Cargar artistas que son de tipo 'artista' con sus murales relacionados
        $artists = User::where('user_type_id', 3) // ID para artistas
                    ->with(['files' => function($query) {
                        $query->where('file_type_id', 3);  // ID para murales
                    }])
                    ->get();

        $products = Product::all();

        return view('personalized.personalizedSale', [
            'artists' => $artists,
            'products' => $products
        ]);
    }

    /**
     * Guarda una nueva personalización en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'artista_id' => 'required|exists:users,id',
            'mural_id' => 'required|exists:files,id',
            'producto_id' => 'required|exists:products,id',
            'descripcion' => 'nullable',
            'datos_contacto' => 'required'
        ]);

        Personalizacion::create([
            'artista_id' => $request->artista_id,
            'mural_id' => $request->mural_id,
            'producto_id' => $request->producto_id,
            'descripcion' => $request->descripcion,
            'datos_contacto' => $request->datos_contacto
        ]);

        return back()->with('success', 'Tu personalización ha sido creada exitosamente.');
    }
}

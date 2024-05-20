<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Personalizacion;

class PersonalizedSaleController extends Controller
{
    public function create()
    {
        // Cargar artistas que son de tipo 'artista' (user_type_id = 3)
        $artists = User::where('user_type_id', 3)->with('files', 'dataUser')->get();

        // Cargar todos los productos
        $products = Product::all();

        // Retornar la vista con los datos necesarios
        return view('personalized.personalizedSale', [
            'artists' => $artists,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'artista_id' => 'required|exists:users,id',
            'mural_id' => 'required|exists:files,id',
            'producto_id' => 'required|exists:products,id',
            'descripcion' => 'nullable|string',
            'datos_contacto' => 'required|string'
        ]);

        // Crear una nueva personalización con los datos validados
        Personalizacion::create([
            'artista_id' => $request->artista_id,
            'mural_id' => $request->mural_id,
            'producto_id' => $request->producto_id,
            'descripcion' => $request->descripcion,
            'datos_contacto' => $request->datos_contacto
        ]);

        // Redirigir de vuelta con un mensaje de éxito
        return back()->with('success', 'Tu personalización ha sido creada exitosamente.');
    }
}

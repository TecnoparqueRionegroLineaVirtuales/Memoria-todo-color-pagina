<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Personalizacion;
use App\Models\CustomizableProduct; // Asegúrate de tener el modelo correcto

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

    // Método para mostrar la vista de creación de producto
    public function showCreateProductForm()
    {
        return view('personalized.create_product');
    }

    // Método para almacenar un producto personalizable
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'sometimes|boolean'
        ]);
    
        $product = new CustomizableProduct();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->active = $request->has('active'); // Esto comprobará si el checkbox está marcado
        $product->save();
    
        return back()->with('success', 'Producto guardado con éxito.');
    }
    

public function listProducts()
{
    $products = CustomizableProduct::all(); // Asegúrate de tener el modelo CustomizableProduct con el namespace correcto
    return view('personalized.list_products', ['products' => $products]);
}

public function editProduct($id)
{
    $product = CustomizableProduct::findOrFail($id);
    return view('personalized.edit_product', ['product' => $product]);
}

public function updateProduct(Request $request, $id)
{
    $product = CustomizableProduct::findOrFail($id);
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'active' => 'sometimes|boolean'
    ]);

    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'active' => $request->active // Asegúrate de que este campo se maneje correctamente
    ]);

    return redirect()->route('personalized.list_products')->with('success', 'Producto actualizado con éxito');
}

public function deleteProduct($id)
{
    $product = CustomizableProduct::findOrFail($id);
    $product->delete();
    return back()->with('success', 'Producto eliminado con éxito');
}

}

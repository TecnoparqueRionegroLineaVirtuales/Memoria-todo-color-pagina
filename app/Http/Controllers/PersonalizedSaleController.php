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
    
        // Cargar todos los productos personalizables
        $customizableProducts = CustomizableProduct::all();
    
        // Retornar la vista con los datos necesarios
        return view('personalized.personalizedSale', [
            'artists' => $artists,
            'customizableProducts' => $customizableProducts // Asegúrate de pasar los productos personalizables
        ]);
    }
    

    public function store(Request $request)
{
    // Validar los datos del formulario
    $validated = $request->validate([
        'artista_id' => 'required|exists:users,id',
        'mural_id' => 'required|exists:files,id',
        'customizable_product_id' => 'required|exists:customizable_products,id',
        'descripcion' => 'nullable|string',
        'datos_contacto' => 'required|string'
    ]);

    dd($validated); // Verificar qué se está recibiendo

    // Si pasa la validación, proceder con la creación
    $personalizacion = Personalizacion::create($validated);
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

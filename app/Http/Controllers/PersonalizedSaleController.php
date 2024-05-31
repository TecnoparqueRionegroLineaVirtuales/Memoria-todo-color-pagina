<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Personalizacion;
use App\Models\CustomizableProduct; // Asegúrate de tener el modelo correcto
use App\Models\File; // Asegúrate de que el modelo File esté correctamente referenciado si se usa

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
            'customizableProducts' => $customizableProducts
        ]);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'artista_id' => 'required|exists:users,id',
            'mural_id' => 'nullable',
            'customizable_product_id' => 'required|exists:customizable_products,id',
            'descripcion' => 'nullable|string',
            'datos_contacto' => 'required|string'
        ]);

        // Si pasa la validación, proceder con la creación
        $personalizacion = Personalizacion::create([
            'artista_id' => $validated['artista_id'],
            'mural_id' => $validated['mural_id'],
            'customizable_product_id' => $validated['customizable_product_id'],
            'descripcion' => $validated['descripcion'],
            'datos_contacto' => $validated['datos_contacto'],
        ]);

        return back()->with('success', 'Tu personalización ha sido creada exitosamente.');
    }

    public function list()
    {
        $personalizacions = Personalizacion::with(['artista', 'mural', 'producto'])->get();
        return view('personalized.list', ['personalizacions' => $personalizacions]);
    }

    public function edit($id)
{
    $personalizacion = Personalizacion::with(['artista', 'mural', 'producto'])->findOrFail($id);
    $artists = User::where('user_type_id', 3)->get();
    $customizableProducts = CustomizableProduct::all();

    // Asumiendo que 'File' es el modelo que usas para 'murals'
    $murals = File::all(); // Ajusta esto según cómo tengas configurado tu modelo para los murales

    return view('personalized.edit', [
        'personalizacion' => $personalizacion,
        'artists' => $artists,
        'customizableProducts' => $customizableProducts,
        'murals' => $murals
    ]);
}


public function update(Request $request, $id)
{
    $personalizacion = Personalizacion::findOrFail($id);

    // Depuración: Verifica los datos recibidos
    $validated = $request->validate([
        'artista_id' => 'required|exists:users,id',
        'mural_id' => 'required|exists:files,id',
        'producto_id' => 'required|exists:customizable_products,id',
        'descripcion' => 'nullable|string',
        'datos_contacto' => 'required|string'
    ]);

    // Verifica si hay cambios en el modelo antes de y después de intentar actualizar
    $personalizacion->fill($validated);
    if ($personalizacion->isDirty()) {
        $personalizacion->save();
        return redirect()->route('personalized.list')->with('success', 'Personalización actualizada con éxito.');
    } else {
        // Agrega un mensaje si no hay cambios
        return back()->with('error', 'No se detectaron cambios en la personalización.');
    }
}



    public function destroy($id)
    {
        $personalizacion = Personalizacion::findOrFail($id);
        $personalizacion->delete();
        return back()->with('success', 'Personalización eliminada con éxito.');
    }
    // Método para listar todos los productos personalizables
    public function listProducts()
    {
        $products = CustomizableProduct::all();
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
public function showCreateProductForm()
{
    return view('personalized.create_product');
}

public function storeProduct(Request $request)
{
    // Validación de los datos del formulario
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'active' => 'sometimes|boolean'
    ]);

    // Creación del producto personalizable
    $product = new CustomizableProduct($validatedData);
    $product->save();

    // Redirección con mensaje de éxito
    return redirect()->route('personalized.list_products')->with('success', 'Producto creado con éxito.');
}

public function deleteProduct($id)
{
    // Buscar el producto personalizable por ID
    $product = CustomizableProduct::findOrFail($id);

    // Eliminar el producto
    $product->delete();

    // Redireccionar a la lista de productos con un mensaje de éxito
    return redirect()->route('personalized.list_products')->with('success', 'Producto eliminado con éxito.');
}


}

<?php

namespace App\Http\Controllers;

use App\Models\category_products;
use Illuminate\Http\Request;

class CategoryProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_products = category_products::all();
      
     
        return view('CategoryProducts.consultProducts', ['category_products' => $category_products]);
    }

    public function createProducts()
    {
        return view('CategoryProducts.createProducts');
    }
    public function showProducts(Request $request)
    {
        category_products::create([
            'description' => $request->description,
            'file_id' => 1
        ]);

        return redirect()->route('categoryProductsIndex')->with('success', 'Categoria registrada Correctamente');
    }
    public function edit(category_products $id){
        return view('CategoryProducts.editProducts', compact('id'));
    }
    public function update(Request $request, $id){
        $id = category_products::findOrFail($id);
        $data = $request->only('description');

        $id->update($data);
        return redirect()->route('categoryProductsIndex')->with('success', 'Categoria actualizado');
    }
    public function destroy($id){
        $category = category_products::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Categoría eliminada correctamente.');
        
    }


}

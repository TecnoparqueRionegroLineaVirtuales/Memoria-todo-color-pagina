<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $products = Product::all();

        $categoryProducts = CategoryProduct::all();
        $query = Product::query()->orderBy('id', 'DESC');

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%');
        }

        $productSearch = $query->simplePaginate(12);

        $productSearch->appends(['search' => $search]);

        return view('products.index', compact('products', 'productSearch', 'categoryProducts', 'search'));
    }

    public function show(Product $product){

        return view('products.show', compact('product'));
    }
}

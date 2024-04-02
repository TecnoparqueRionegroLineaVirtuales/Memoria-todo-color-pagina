<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Symfony\Contracts\Service\Attribute\Required;
use Cart;
use Darryldecode\Cart\Cart as CartCart;

class cartController extends Controller
{
    public function add(Request $request){
       
        $product = Product::find($request->product_id);
        $total = 0;
        Cart::add(
            $product->id,
            $product->name,
            $product->price,
            1,
            array("url"=>$product->files->route),
            $total = $product->price + $total
        );

        return back()->with('success',"Se agrego el producto al carrito");
    }
    public function cart(){
       
        return View('products.checkout');
    }
    public function removeitem(Request $request){
        //$product = Product::where(id, $request->id->firstOrFail();
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado del carrito");
    }
}

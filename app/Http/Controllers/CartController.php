<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $qty = $request->input('quantity');
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $qty);

        $request->session()->put('cart', $cart);
        
        return redirect('/shop/products');
    }

    public function showCart()
    {
        if(!Session::get('cart'))
        {
            return view('cart.showcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        return view('cart.showcart', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice,
        'totalQty'=>$cart->totalQty]);
    }

    public function removeFromCart(Request $request, Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->delete($product, $product->id);

        $request->session()->put('cart', $cart);

        if(Session::get('cart')->totalQty == 0)
        {
            Session::forget('cart');
        }
        
        return redirect('shop/cart');
    }
}

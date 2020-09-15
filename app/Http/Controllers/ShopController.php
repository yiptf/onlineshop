<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $product = new Product();

        return view('product.create', compact('product'));
    }

    public function store()
    {
        Product::create($this->validatedData());

        return redirect('/shop/products');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Product $product)
    {
        $product->update($this->validatedData());

        return redirect('/shop/products/' . $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/shop/products');
    }

    protected function validatedData()
    {
        return request()->validate([
            'imagePath'=>'required',
            'name'=>'required',
            'price'=>'required'
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        // kalau akses dari API
        if (request()->is('api/*')) {

            return response()->json([
                'error' => false,
                'list' => $products
            ]);
        }

        // kalau akses dari web
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ],[
            'name.required' => 'Nama product wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'stock.required' => 'Stock wajib diisi',
        ]);

        Product::create($request->all());

        return redirect('/products')
            ->with('success', 'Product berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect('/products')
            ->with('success', 'Product berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')
            ->with('success', 'Product berhasil dihapus');
    }
}
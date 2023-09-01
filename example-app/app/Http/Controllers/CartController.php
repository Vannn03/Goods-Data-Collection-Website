<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        return view('addToCart')->with('product', $product);
    }


    public function storeToCart(Request $request)
    {
        Cart::create([
            'barangId' => $request-> id,
            'kategoriBarang' => $request->kategoriBarang,
            'namaBarang' => $request->namaBarang,
            'hargaBarang' => $request->hargaBarang,
            'jumlahBarang' => $request->jumlahBarang,
        ]);
        return redirect('/');
    }
}

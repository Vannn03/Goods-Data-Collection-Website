<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function addBarang()
    {
        $this->authorize('is_admin');
        $categories = Category::all();
        return view('addBarang')->with('categories', $categories);
    }

    public function storeBarang(Request $request)
    {
        $request->validate([
            'kategoriBarang' => 'required',
            'namaBarang' => 'required|unique:products,namaBarang|min:5|max:80',
            'hargaBarang' => 'required',
            'jumlahBarang' => 'required',
            'fotoBarang' => 'mimes:jpg,bmp,png'
        ]);

        if ($request->hasFile('fotoBarang')) {
            $name = $request->file('fotoBarang')->getClientOriginalName();
            $fileName = $name;
            $request->file('fotoBarang')->storeAs('/public/products/', $fileName);

            Product::create([
                'kategoriBarang' => $request->kategoriBarang,
                'namaBarang' => $request->namaBarang,
                'hargaBarang' => $request->hargaBarang,
                'jumlahBarang' => $request->jumlahBarang,
                'fotoBarang' => $fileName
            ]);
        } else {
            Product::create([
                'kategoriBarang' => $request->kategoriBarang,
                'namaBarang' => $request->namaBarang,
                'hargaBarang' => $request->hargaBarang,
                'jumlahBarang' => $request->jumlahBarang,
                'fotoBarang' => ""
            ]);
        }
        return redirect('/');
    }

    public function viewBarang()
    {
        $products  = Product::all();
        return view('welcome')->with('products', $products);
    }

    public function editBarang($id)
    {
        $this->authorize('is_admin');
        $product = Product::findOrFail($id);
        return view('updateBarang')->with('product', $product);
    }

    public function updateBarang($id, Request $request)
    {
        $request->validate([
            'hargaBarang' => 'required',
            'jumlahBarang' => 'required',
            'fotoBarang' => 'mimes:jpg,bmp,png'
        ]);

        
        if ($request->hasFile('fotoBarang')) {
            $name = $request->file('fotoBarang')->getClientOriginalName();
            $fileName = $name;
            $request->file('fotoBarang')->storeAs('/public/products/', $fileName);

            Product::findOrFail($id)->update([
                'hargaBarang' => $request->hargaBarang,
                'jumlahBarang' => $request->jumlahBarang,
                'fotoBarang' => $fileName
            ]);
        }
        else {
            Product::findOrFail($id)->update([
                'hargaBarang' => $request->hargaBarang,
                'jumlahBarang' => $request->jumlahBarang,
                'fotoBarang' => ""
            ]);
        }
        return redirect('/');
    }

    public function deleteBarang($id)
    {
        Product::destroy($id);
        return redirect('/');
    }
}

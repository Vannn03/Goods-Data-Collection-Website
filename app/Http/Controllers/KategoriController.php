<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function addKategori() {
        $this->authorize('is_admin');
        return view('addKategori');
    }

    public function storeKategori(Request $request) {
        $request->validate([
            'namaKategori' => 'required'
        ]);

        Category::create([
            'namaKategori' => $request -> namaKategori,
        ]);
        return redirect('/');
    }
}

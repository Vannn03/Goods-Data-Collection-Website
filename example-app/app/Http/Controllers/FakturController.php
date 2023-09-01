<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Http\Request;

class FakturController extends Controller
{
    public function printFaktur() {
        $carts = Cart::all();
        return view('printFaktur') -> with('carts', $carts);
    }

    public function storeFaktur(Request $request) {
        $request->validate([
            'nomorInvoice',
            'kategoriBarang',
            'namaBarang',
            'jumlahBarang' => 'numeric|unique:invoices,jumlahBarang|min:1|lte:{jumlahBarang}',
            'alamatPengiriman' => 'required|unique:invoices,alamatPengiriman|min:10|max:100',
            'kodePos' => 'required|digits:5',
        ]);

        Invoice::create([
            'nomorInvoice' => $request -> nomorInvoice,
            'kategoriBarang' => $request -> kategoriBarang,
            'namaBarang' => $request-> namaBarang,
            'jumlahBarang' => $request -> jumlahBarang,
            'alamatPengiriman' => $request -> alamatPengiriman,
            'kodePos' => $request -> kodePos,
        ]);
        return redirect('/');
    }
}

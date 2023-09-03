<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class FakturController extends Controller
{
    public function printFaktur()
    {
        $carts = Cart::all();
        return view('printFaktur')->with('carts', $carts);
    }

    public function storeFaktur(Request $request)
    {
        // Validate the request data
        $request->validate([
            'alamatPengiriman' => 'required|min:10|max:100',
            'kodePos' => 'required|digits:5',
        ]);

        $barangId = $request->barangId;
        $kategoriBarang = $request->kategoriBarang;
        $namaBarang = $request->namaBarang;
        $jumlahBarang = $request->jumlahBarang;
        $subTotal = $request->subTotal;

        $invoices = [];

        if ($barangId == 0) {
            // Tidak terjadi apa"
        }
        else {
            foreach ($barangId as $key => $value) {
                $invoices[] = Invoice::create([
                    'nomorInvoice' => $request->nomorInvoice,
                    'barangId' => $value,
                    'kategoriBarang' => $kategoriBarang[$key],
                    'namaBarang' => $namaBarang[$key],
                    'jumlahBarang' => $jumlahBarang[$key],
                    'subTotal' => $subTotal[$key],
                    'alamatPengiriman' => $request->alamatPengiriman,
                    'kodePos' => $request->kodePos,
                ]);
            }
    
            Cart::query()->delete();

        }
        return redirect('/');

    }

    public function deleteBarangFaktur($id)
    {
        // Update jumlah barang jika salah satu barang di faktur di remove (404)
        /* 
        $product = Product::findOrFail($id);
        $cart = Cart::findOrFail($id);
        
        $product->update([
            'jumlahBarang' => $product->jumlahBarang - $cart->jumlahBarang,
        ]);   
        */
        
        Cart::destroy($id);

        return redirect('print/faktur/');
    }
}

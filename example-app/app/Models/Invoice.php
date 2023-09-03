<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomorInvoice',
        'barangId',
        'kategoriBarang',
        'namaBarang',
        'jumlahBarang',
        'subTotal',
        'alamatPengiriman',
        'kodePos',
    ];

    public function productRelationship() {
        return $this->hasMany(Product::class, 'barangId');
    }
}

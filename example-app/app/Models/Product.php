<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategoriBarang',
        'namaBarang',
        'hargaBarang',
        'jumlahBarang',
        'fotoBarang',
    ];

    public function categoryRelationship() {
        return $this->belongsTo(Category::class, 'kategoriBarang', 'id');
    }

    public function cartRelationship() {
        return $this->belongsTo(Cart::class, 'barangId', 'id');
    }

    public function invoiceRelationship() {
        return $this->belongsTo(Invoice::class, 'barangId', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangId',
        'kategoriBarang',
        'namaBarang',
        'hargaBarang',
        'jumlahBarang',
    ];

    public function productRelationship() {
        return $this->hasMany(Product::class, 'barangId');
    }
}

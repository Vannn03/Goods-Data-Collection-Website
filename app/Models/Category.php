<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaKategori'
    ];

    public function productRelationship() {
        return $this->hasMany(Product::class, 'kategoriBarang');
    }
}

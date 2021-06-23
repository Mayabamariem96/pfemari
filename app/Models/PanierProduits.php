<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanierProduits extends Model
{
    use HasFactory;
    protected $fillable = [
        'panier_id',
        'produit_id',
        'qty'
    ];
    public function produits(){
        return $this->hasMany(Produit::class);
    }
}

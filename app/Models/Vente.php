<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = ['qtevendu','datevente','prixvendu','client_id','produit_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produit() 
    {
        return $this->belongsTo(Produit::class);
    }
}

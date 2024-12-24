<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plat extends Model
{
    use HasFactory;

    protected $fillable = ['categorie_id', 'intitulé', 'description', 'prix', 'photo'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function composants()
    {
        return $this->belongsToMany(Composant::class, 'composant_plat')->withPivot('quantite', 'unité');
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_plat')->withPivot('nombre');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;

    protected $fillable = ['serveur_id', 'numero_table', 'etat', 'payé'];

    public function serveur()
    {
        return $this->belongsTo(Serveur::class);
    }

    public function plats()
    {
        return $this->belongsToMany(Plat::class, 'commande_plat')->withPivot('nombre');
    }
}


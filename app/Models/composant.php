<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class composant extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    public function plats()
    {
        return $this->belongsToMany(Plat::class, 'composant_plat')->withPivot('quantite', 'unité');
    }
}


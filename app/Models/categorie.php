<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'photo'];

    public function plats()
    {
        return $this->hasMany(Plat::class);
    }
}

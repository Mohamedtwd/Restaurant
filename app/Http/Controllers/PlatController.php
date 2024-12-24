<?php

namespace App\Http\Controllers;

use App\Models\plat;
use App\Models\categorie;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    // Liste des plats d’une catégorie donnée
    public function platsParCategorie(categorie $categorie)
    {
        $plats = Plat::where('categorie_id', $categorie->id)->get();
        return response()->json($plats);
    }

    // Le titre de la catégorie d’un plat donné
    public function categorieDuPlat(plat $plat)
    {
        $titreCategorie = $plat->categorie->titre; // Relation "belongsTo"
        return response()->json(['titre' => $titreCategorie]);
    }

    // La composition d’un plat donné
    public function compositionDuPlat(plat $plat)
    {
        $compositions = $plat->composants()->withPivot('quantite', 'unité')->get();
        return view('Composition', compact('compositions'));

    }
}

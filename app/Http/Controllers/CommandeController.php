<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\plat;
use App\Models\Serveur;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    // Les commandes « en cours » d’un serveur donné
    public function commandesEnCoursServeur(Serveur $serveur)
    {
        $commandes = Commande::where('serveur_id', $serveur->id)
                             ->where('etat', 'en cours')
                             ->get();
        return response()->json($commandes);
    }

    // Les plats d’une commande donnée
    public function platsParCommande(Commande $commande)
    {
        $plats = $commande->plats()->withPivot('nombre')->get();
        return response()->json($plats);
    }

    // Les plats à préparer pour toutes les commandes « en cours »
    public function platsCommandesEnCours()
    {
        $plats = plat::whereHas('commandes', function ($query) {
            $query->where('etat', 'en cours');
        })->get();

        return response()->json($plats);
    }

    // Les commandes en état « servi » et non payées
    public function commandesServiNonPayees()
    {
        $commandes = Commande::where('etat', 'servi')
                             ->where('payé', false)
                             ->get();
        return response()->json($commandes);
    }

    // Les commandes où on a demandé plus de 5 plats différents
    public function commandesPlusDe5Plats()
    {
        $commandes = Commande::whereHas('plats', function ($query) {
            $query->selectRaw('COUNT(plat_id) as total')
                  ->groupBy('commande_id')
                  ->having('total', '>', 5);
        })->get();

        return response()->json($commandes);
    }

    // Le montant total à payer pour une commande donnée
    public function montantTotalCommande(Commande $commande)
    {
        $total = $commande->plats->sum(function ($plat) {
            return $plat->prix * $plat->pivot->nombre;
        });

        return response()->json(['total' => $total]);
    }

    // Le nombre total des commandes affectées hier à un serveur donné
    public function commandesHierServeur(Serveur $serveur)
    {
        $totalCommandes = Commande::where('serveur_id', $serveur->id)
                                  ->whereDate('created_at', now()->subDay())
                                  ->count();

        return response()->json(['total_commandes' => $totalCommandes]);
    }
}

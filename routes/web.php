<?php

use App\Http\Controllers\PlatController;
use App\Http\Controllers\CommandeController;

// Routes pour les plats
Route::get('/categorie/{categorie}/plats', [PlatController::class, 'platsParCategorie']);
Route::get('/plat/{plat}/categorie', [PlatController::class, 'categorieDuPlat']);
Route::get('/plat/{plat}/composition', [PlatController::class, 'compositionDuPlat']);

// Routes pour les commandes
Route::get('/serveur/{serveur}/commandes-en-cours', [CommandeController::class, 'commandesEnCoursServeur']);
Route::get('/commande/{commande}/plats', [CommandeController::class, 'platsParCommande']);
Route::get('/plats-en-cours', [CommandeController::class, 'platsCommandesEnCours']);
Route::get('/commandes-servi-non-payees', [CommandeController::class, 'commandesServiNonPayees']);
Route::get('/commandes-plus-de-5-plats', [CommandeController::class, 'commandesPlusDe5Plats']);
Route::get('/commande/{commande}/montant', [CommandeController::class, 'montantTotalCommande']);
Route::get('/serveur/{serveur}/commandes-hier', [CommandeController::class, 'commandesHierServeur']);


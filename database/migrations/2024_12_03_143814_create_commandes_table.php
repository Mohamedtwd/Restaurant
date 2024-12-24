<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serveur_id')->constrained('serveurs')->onDelete('cascade'); // clé étrangère
            $table->integer('numero_table')->nullable(); // Peut être nul
            $table->enum('etat', ['en cours', 'terminé', 'servi', 'emporté'])->default('en cours'); // État avec valeur par défaut
            $table->boolean('payé')->default(false); // Boolean
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};

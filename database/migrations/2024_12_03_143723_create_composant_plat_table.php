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
        Schema::create('composant_plat', function (Blueprint $table) {
            $table->foreignId('composant_id')->constrained('composants')->onDelete('cascade'); // clé étrangère
            $table->foreignId('plat_id')->constrained('plats')->onDelete('cascade'); // clé étrangère
            $table->decimal('quantite', 8, 2);
            $table->string('unité');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composant_plat');
    }
};

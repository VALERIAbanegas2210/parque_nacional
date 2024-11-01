<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            
            $table->foreignId('comunidad_id')->constrained('comunidads')->onDelete('cascade');
            $table->text('descripcion'); // Campo descripción
            $table->timestamp('fecha')->useCurrent(); // Campo fecha con valor actual
            $table->integer('puntuacion'); // Campo puntuación
            $table->string('imagen')->nullable(); // Campo para almacenar la ruta de la imagen
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};

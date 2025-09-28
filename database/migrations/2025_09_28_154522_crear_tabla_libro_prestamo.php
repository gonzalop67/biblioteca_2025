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
        Schema::create('libro_prestamo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_libroprestamo_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id', 'fk_libroprestamo_libro')->references('id')->on('libro')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_prestamo');
            $table->string('prestado_a', 100);
            $table->boolean('estado');
            $table->date('fecha_devolucion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro_prestamo');
    }
};

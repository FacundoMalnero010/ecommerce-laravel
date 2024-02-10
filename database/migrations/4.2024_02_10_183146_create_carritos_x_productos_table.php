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
        Schema::create('carritos_x_productos', function (Blueprint $table) {
            $table->unsignedBigInteger('carrito_id');
            $table->unsignedBigInteger('producto_id');
            $table->bigInteger('cantidad');
            $table->float('monto_acumulado');

            $table
                ->foreign('carrito_id')
                ->references('id')
                ->on('carritos')
                ->cascadeOnDelete();

            $table
                ->foreign('producto_id')
                ->references('id')
                ->on('productos')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carritos_x_productos');
    }
};

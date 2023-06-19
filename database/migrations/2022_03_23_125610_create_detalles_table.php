<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();            
            $table->integer('cantidad')->default(0);
            $table->decimal('preciototal',7,2)->default(0);
            $table->foreignId('producto_id')->references('id')->on('productos');
            $table->foreignId('pedido_id')->references('id')->on('pedidos');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
};

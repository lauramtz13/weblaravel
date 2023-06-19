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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug',25)->nullable();
            $table->string('seo_title',67)->nullable();
            $table->string('seo_description',155)->nullable();
            $table->string('seo_image',100)->nullable();
            $table->string('name',25)->nullable();
            $table->text('description')->nullable();
            $table->string('image',100)->nullable();
            $table->integer('orden')->nullable();
            $table->integer('visitas')->nullable();
            $table->boolean('publicado')->default(0);     
            $table->foreignId('producto_id')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};

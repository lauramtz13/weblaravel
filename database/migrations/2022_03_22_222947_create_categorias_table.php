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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();            
            $table->string('slug',25)->nullable();
            $table->string('seo_title',67)->nullable();
            $table->string('seo_description',155)->nullable();
            $table->string('seo_image',100)->nullable();
            $table->string('name',25)->nullable();
            $table->text('description')->nullable();
            $table->string('image',100)->nullable();
            $table->integer('orden')->nullable();
            $table->boolean('portada')->default(0);
            $table->boolean('publicado')->default(0);           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};

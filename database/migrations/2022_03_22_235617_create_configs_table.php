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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();            
             $table->string('_slogan',150)->nullable();
             $table->string('_razonsocial',150)->nullable();
             $table->string('_email',100)->nullable();
             $table->string('_direccion',190)->nullable();
             $table->string('_celular',9)->nullable();
             $table->string('_logo',50)->nullable();
             $table->string('_favicon',50)->nullable();
             $table->string('seo_title',67)->nullable();
             $table->string('seo_description',155)->nullable();
             $table->string('seo_image',50)->nullable();
             $table->string('link_facebook',190)->nullable();
             $table->string('link_whatsapp',190)->nullable();
             $table->string('link_tiktok',190)->nullable();
             $table->string('link_instagram',190)->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
};

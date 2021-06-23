<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('categorie')->nullable();
            $table->string('commande_confirme')->nullable();
            $table->string('image')->nullable();
            $table->string('path')->nullable();
            $table->integer('prix')->nullable();
            $table->integer('quantite')->nullable();
            $table->integer('reviews')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('produits');
    }
}

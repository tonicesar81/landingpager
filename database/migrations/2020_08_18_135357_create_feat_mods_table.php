<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatModsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feat_mods', function (Blueprint $table) {
            $table->id();
            $table->string('anchor')->nullable();
            $table->string('bg_image')->nullable();
            $table->integer('fixed')->nullable();
            $table->string('bg_color')->nullable();
            $table->text('content')->nullable();
            $table->integer('enabled')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('feat_mods');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopCtasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_ctas', function (Blueprint $table) {
            $table->id();
            $table->string('anchor')->nullable();
            $table->integer('logo')->nullable();
            $table->integer('whats')->nullable();
            $table->string('bg_image')->nullable();
            $table->integer('fixed')->nullable();
            $table->string('bg_color')->nullable();
            $table->text('content')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_class')->nullable();
            $table->string('cta_link')->nullable();
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
        Schema::dropIfExists('top_ctas');
    }
}

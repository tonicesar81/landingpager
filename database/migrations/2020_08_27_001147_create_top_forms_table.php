<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_forms', function (Blueprint $table) {
            $table->id();
            $table->string('anchor')->nullable();
            $table->integer('logo')->nullable();
            $table->integer('whats')->nullable();
            $table->string('bg_image')->nullable();
            $table->integer('fixed')->nullable();
            $table->string('bg_color')->nullable();
            $table->text('content')->nullable();
            $table->string('email')->nullable();
            $table->string('btn_class')->nullable();
            $table->text('form_title')->nullable();
            $table->string('form_color')->nullable();
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
        Schema::dropIfExists('top_forms');
    }
}

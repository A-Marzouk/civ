<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->string('color')->nullable();
            $table->string('job_title')->nullable();
            $table->text('emotions')->nullable();
            $table->text('design_style')->nullable();
            $table->string('code')->unique()->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->default(1);
            $table->string('developer')->nullable();
            $table->smallInteger('is_active')->nullable();

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
        Schema::dropIfExists('themes');
        Schema::dropIfExists('theme_user');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('year')->nullable();
            $table->string('category')->nullable();
            $table->integer('order')->default(1);
            $table->text('description')->nullable();
            $table->string('image_src')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_public')->default(true);

            $table->integer('user_id')->unsigned();
            $table->integer('resume_link_id')->unsigned()->nullable();
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
        Schema::dropIfExists('achievements');
    }
}

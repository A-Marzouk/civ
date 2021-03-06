<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->text('transcript')->nullable();
            $table->string('url')->nullable();
            $table->string('media_preview')->default('/images/video-holder.svg');
            $table->boolean('is_public')->default(true);
            $table->integer('order')->default(1);

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
        Schema::dropIfExists('media');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('category')->nullable();
            $table->string('link')->nullable();
            $table->integer('order')->default(1);
            $table->string('link_title')->nullable();
            $table->integer('is_active')->default(1);
            $table->boolean('is_public')->default(true);

            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('links');
    }
}

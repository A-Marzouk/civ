<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('address')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->text('reference_text')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('references');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('institution_type')->nullable();
            $table->string('university_name')->nullable();
            $table->string('degree_title')->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
            $table->boolean('present')->nullable();
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
        Schema::dropIfExists('education');
    }
}

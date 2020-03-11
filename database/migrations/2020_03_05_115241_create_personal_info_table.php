<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_info', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->text('about')->nullable();

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
        Schema::dropIfExists('personal_info');
    }
}

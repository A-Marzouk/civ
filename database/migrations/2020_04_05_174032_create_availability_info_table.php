<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailabilityInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availability_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('available_hours',16,2)->nullable();
            $table->string('available_hours_frequency')->nullable();
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
        Schema::dropIfExists('availability_info');
    }
}

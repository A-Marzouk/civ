<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_data', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('number_of_registers')->nullable();
            $table->float('percentage',16,2)->nullable();
            $table->float('profit',16,2)->nullable();



            $table->integer('user_id');
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
        Schema::dropIfExists('affiliate_data');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('label');
            $table->timestamps();
        });

        Schema::create('user_has_url_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('url_permission_id');

            $table->foreign('url_permission_id')
                ->references('id')
                ->on('url_permissions')
                ->onDelete('cascade');

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
        Schema::dropIfExists('url_permissions');
        Schema::dropIfExists('user_has_url_permissions');
    }
}

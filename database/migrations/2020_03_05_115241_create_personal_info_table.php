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

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->string('profile_pic')->default('/images/resume_builder/profile/holder.png');

            $table->string('phone')->nullable();
            $table->boolean('is_phone_active')->default(1);

            $table->string('nationality')->nullable();
            $table->boolean('is_nationality_active')->default(1);

            $table->text('quote')->nullable();
            $table->boolean('is_quote_active')->default(1);

            $table->string('hometown')->nullable();
            $table->boolean('is_hometown_active')->default(1);

            $table->date('date_of_birth')->default('1995-01-01');
            $table->boolean('is_date_of_birth_active')->default(1);

            $table->string('location')->nullable();
            $table->boolean('is_location_active')->default(1);

            $table->text('about')->nullable();
            $table->boolean('is_about_active')->default(1);

            $table->text('overview')->nullable();
            $table->boolean('is_overview_active')->default(1);

            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('personal_info');
    }
}

<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unique();

            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable()->index();
            $table->integer('theme_id')->default(1);
            $table->integer('resume_link_id')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            // social logins ID's holder
            $table->string('github_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('linkedin_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('instagram_id')->nullable();

            $table->timestamp('last_activity')->useCurrent();


            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

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
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->bigInteger('dni')->unique();
            $table->double('phone')->nullable();
            $table->double('phone_two')->nullable();
            $table->string('address')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('son_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['SUPERADMIN', 'ADMIN', 'COORDINATOR','LIDER','USER'])->default('USER');
            $table->enum('status', ['ACTIVE','INACTIVE'])->default('ACTIVE');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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

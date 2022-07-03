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
            $table->string('name');
            $table->string('email',120)->unique();
            $table->string('tempat_lahir',60)->nullable();
            $table->string('no_hp',23)->nullable();
            $table->string('role',23)->default('member');
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat_lengkap',500)->nullable();
            $table->enum('jenis_kelamin',['L','P'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(0);
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

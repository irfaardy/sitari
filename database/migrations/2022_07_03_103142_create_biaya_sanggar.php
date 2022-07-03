<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaSanggar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_sanggar', function (Blueprint $table) {
            $table->string('code')->unique();
            $table->double('harga',12,2)->default(0);
            $table->double('ppn',12,2)->nullable();
            $table->double('administrasi',12,2)->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biaya_sanggar');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userapps', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_user');
            $table->string('username');
            $table->string('email');
            $table->string('no_tlpn');
            $table->string('alamat');
            $table->string('gambar_user');
            $table->string('password');
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
        Schema::dropIfExists('userapps');
    }
}

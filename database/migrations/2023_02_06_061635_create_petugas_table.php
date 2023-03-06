<?php

use App\Models\Level;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('username', '25')->unique();
            $table->string('password');
            $table->string('nama_petugas', '35')->nullable()->default('bukan-petugas');
            $table->foreignIdFor(Level::class)->default(3);
            $table->string('img')->default('No Image');
            $table->string('alamat')->default('Tidak Menambahkan Alamat');
            $table->string('no_telp')->default('Tidak Menambahkan No Telp');
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
        Schema::dropIfExists('petugas');
    }
};

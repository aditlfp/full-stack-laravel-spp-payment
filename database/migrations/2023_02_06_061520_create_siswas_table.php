<?php

use App\Models\Kelas;
use App\Models\Spp;
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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('img')->default('No Image');
            $table->string('nisn', '10')->unique();
            $table->string('nis', '8')->unique();
            $table->string('nama', '35');
            $table->foreignIdFor(Kelas::class, 'id_kelas');
            $table->string('alamat')->default('Tidak Menambahkan Alamat');
            $table->string('no_telp')->default('Tidak Menambahkan No Telp');
            $table->foreignIdFor(Spp::class, 'id_spp');
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
        Schema::dropIfExists('siswas');
    }
};

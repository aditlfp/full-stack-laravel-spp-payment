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
            $table->string('nisn', '10');
            $table->string('nis', '8');
            $table->string('nama', '35');
            $table->foreignIdFor(Kelas::class, 'id_kelas');
            $table->string('alamat');
            $table->string('no_telp', '13');
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

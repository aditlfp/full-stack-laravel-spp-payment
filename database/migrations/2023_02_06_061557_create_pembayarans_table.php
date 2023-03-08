<?php

use App\Models\ConfirmPayment;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Status;
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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Petugas::class, 'id_petugas');
            $table->foreignIdFor(Siswa::class, 'nisn');
            $table->string('tgl_bayar');
            $table->foreignIdFor(Siswa::class, 'id_spp');
            $table->foreignIdFor(Status::class)->default(1);
            $table->string('keterangan')->default('Belum Lunas');
            $table->string('lain_lain')->default('-');
            $table->string('uang_bayar');
            $table->string('jumlah_bayar');
            $table->string('kembalian_bayar')->nullable();
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
        Schema::dropIfExists('pembayarans');
    }
};

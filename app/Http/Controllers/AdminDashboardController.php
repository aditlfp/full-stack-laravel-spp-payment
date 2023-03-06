<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Contact;
use CacheHelper;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get All Data
        $peAll = Petugas::all()->firstOrFail();
        $spAll = Spp::all();
        $petugas = Petugas::paginate(10)->onEachSide(1)->fragment('petugas');

        // Getting Count Model
        $spp = Pembayaran::count();
        $siswa = Siswa::count();
        $getSpp = Spp::count();
        $pe = Petugas::whereIn('level_id', [1,2])->count();
        $users = Petugas::count();
        $kelas = Kelas::count();
        $ct = Contact::count();

        // Total of jumlah_bayar
        $pay = Pembayaran::all();

        // User Online

        return view('admin.dashboard.index', 
        compact(
            'peAll',
            'spAll',
            'spp',
            'pe',
            'pay',
            'petugas',
            'siswa',
            'getSpp',
            'users',
            'kelas',
            'ct'
        ));
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Imports\SiswaImport;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AdminSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::paginate(5)->onEachSide(1)->fragment('siswa');
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.create', ['kelas' => $kelas, 'spp' => $spp]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {

         $siswa = new Siswa();
         
         $siswa = [
            'img' => $request->img,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp
         ];

        if($request->hasFile('img'))
        {
            $siswa['img'] = UploadImage($request, 'img');
        }


        Siswa::create($siswa);
        toastr('Data Success To Add', 'success', 'Success !');
        return redirect()->back();
    }


    public function import(Request $request)
    {
        if($request->file)
        {
            Excel::import(new SiswaImport,  $request->file('file'));
        }else{
            toastr('Data Failed To Add', 'error', 'Error !');
            return redirect()->back();
        }
        toastr('Data Success To Add', 'success', 'Success !');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spp = Spp::all();
        $arr = Siswa::all();
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.edit', ['siswa' => $siswa, 'arr' => $arr, 'spp' => $spp, 'kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = [
            'img' => $request->img,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp
         ];

        if($request->hasFile('img'))
        {
            if($request->oldimage)
            {
                Storage::disk('public')->delete('images/' . $request->oldimage);
            }

            $siswa['img'] = UploadImage($request, 'img');
        }

        Siswa::findOrFail($id)->update($siswa);
        toastr('Data Success To Updated', 'success', 'Success !');
        return redirect()->to(route('siswa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if($siswa->img)
        {
            Storage::disk('public')->delete('images/' . $siswa->img);

        }
        $siswa->delete();
        toastr('Data Has Been Deleted', 'warning', 'Warning !');
        return redirect()->back();
    }
}

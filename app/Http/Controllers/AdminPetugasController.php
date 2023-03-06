<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetugasRequest;
use App\Models\Level;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::paginate(20)->onEachSide(1)->fragment('petugas');
        return view('admin.petugas.index', ['petugas' => $petugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas = Level::all();
        return view('admin.petugas.create', ['petugas' => $petugas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetugasRequest $request)
    {
        $petugas = new Petugas();
        $petugas = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_petugas' => $request->nama_petugas,
            'level_id' => $request->level_id,
            'img' => $request->img,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ];

        if($request->hasFile('img'))
        {
            $petugas['img'] = UploadImage($request, 'img');
        }
        else
        {
            return redirect()->back();
        }

        Petugas::create($petugas);
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
        $petugas = Petugas::findOrFail($id);
        return view('admin.petugas.edit', ['petugas' => $petugas]);
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
        $petugas = [
            'username' => $request->username,
            'nama_petugas' => $request->nama_petugas,
            'img' => $request->img,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'oldimage' => $request->oldimage,
        ];

        if($request->hasFile('img'))
        {
            if($request->oldimage)
            {
                Storage::disk('public')->delete('images/'.$request->oldimage);
            }
            $petugas['img'] = UploadImage($request, 'img');
        }

        Petugas::find($id)->update($petugas);
        toastr('Data Success To Updated', 'success', 'Success !');
        return redirect()->to(route('petugas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::where('id', $id);
        if($petugas->image){
            Storage::disk('public')->delete('images/'.$petugas->image);
        }
        $petugas->delete();
        toastr()->warning('Product Berhasil Di Hapus !', 'Warning!');
        return redirect()->back();
    }
}

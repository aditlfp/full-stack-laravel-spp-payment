<?php

namespace App\Http\Controllers;

use App\Http\Requests\SppRequest;
use App\Models\Spp;
use Illuminate\Http\Request;

class AdminSppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::paginate(5)->onEachSide(1)->fragment('spp');
        return view('admin.spp.index', ['spp' => $spp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SppRequest $request)
    {
        $spp = new Spp();
        $spp = [
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ];
        Spp::create($spp);
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
        $spp = Spp::findOrFail($id);
        return view('admin.spp.edit', ['spp' => $spp]);
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
        $spp = [
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ];

        Spp::findOrFail($id)->update($spp);
        toastr('Data Has Been Success Updated', 'success', 'Success !');
        return redirect()->to(route('spp.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spp = Spp::findOrFail($id);
        $spp->delete();
        toastr('Data Success To Delete', 'warning', 'Warning !');
        return redirect()->back();
    }
}

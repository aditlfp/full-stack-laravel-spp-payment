<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmPayRequest;
use App\Models\ConfirmPayment;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class HistoryPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pe = Pembayaran::all();
        $pay = Pembayaran::paginate(25)->onEachSide(1)->fragment('payment');
        return view('user.history.index', compact('pay', 'pe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfirmPayRequest $request)
    {
        $confPay = new ConfirmPayment();
        

        $confPay = [
            'code_pay' => $request->code_pay,
            'siswa_id' => $request->siswa_id,
            'pembayaran_id' => $request->pembayaran_id,
            'spp_id' => $request->spp_id,
            'img' => $request->img
        ];

        if($request->hasFile('img'))
        {
            $confPay['img'] = UploadImage($request, 'img');
        }
        else
        {
            toastr('Bukti Pembayaran Harus Ditambahkan', 'erorr', 'Erorr !');
            return redirect()->back();
        }

        ConfirmPayment::create($confPay);
        toastr('Succes To Send Confirmation Payment', 'success', 'Success !');
        return redirect()->to(route('pay.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $confPay = ConfirmPayment::find($id);
        $pay = Pembayaran::findOrFail($id);
        return view('user.history.detail', compact('confPay', 'pay'));
    }


}

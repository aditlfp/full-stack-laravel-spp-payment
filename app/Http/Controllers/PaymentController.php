<?php

namespace App\Http\Controllers;

use Dompdf\Options;
use Dompdf\Dompdf;
use App\Http\Requests\PaymentRequest;
use App\Models\ConfirmPayment;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay = Pembayaran::paginate(5)->onEachSide(1)->fragment('payment');
        return view('payment.spp.index', ['pay' => $pay]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pe = Petugas::all();
        $sis = Siswa::all();
        $sp = Spp::all();
        return view('payment.spp.create',[ 'pe' => $pe, 'sis' => $sis, 'sp' => $sp,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $pay = new Pembayaran();

        $pay = [
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'tgl_bayar' => $request->tgl_bayar,
            'id_spp' => $request->id_spp,
            'status_id' => $request->status_id,
            'keterangan' => $request->keterangan,
            'uang_bayar' => $request->uang_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'kembalian_bayar' => $request->kembalian_bayar,
        ];

        Pembayaran::create($pay);
        toastr('Succes To Create Payment', 'success', 'Success !');
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
        $confPay = ConfirmPayment::find($id);
        $pay = Pembayaran::findOrFail($id);
        return view('payment.spp.conf', compact('confPay', 'pay'));
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $pe = Petugas::all();
        $sis = Siswa::all();
        $sp = Spp::all();
        $pay = Pembayaran::findOrFail($id);
        return view('payment.spp.edit', compact('pe', 'sis', 'sp', 'pay'));
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
        $pay = [
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'tgl_bayar' => $request->tgl_bayar,
            'id_spp' => $request->id_spp,
            'status_id' => $request->status_id,
            'keterangan' => $request->keterangan,
            'uang_bayar' => $request->uang_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'kembalian_bayar' => $request->kembalian_bayar,
        ];

        Pembayaran::findOrFail($id)->update($pay);
        toastr('Data Has Been Success Updated', 'success', 'Success !');
        return redirect()->to(route('payment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay = Pembayaran::findOrFail($id);
        $conf = ConfirmPayment::findOrFail($id);
        if ($conf->img) {
            Storage::disk('public')->delete('images/'.$pay->img);
        }
        $conf->delete();
        $pay->delete();
        toastr('Succes To Delete A Payment', 'warning', 'Warning !');
        return redirect()->back();

    }

    public function success(Request $request, $id)
    {
        $pay = Pembayaran::findOrFail($id);
        $pay->status_id = '3';
        $pay->keterangan = 'Lunas';
        $pay->save();
        toastr('Succes To Approve Payment', 'success', 'Success !');
        return redirect()->back();
    }

    public function expdf(Request $request)
    {
        $pay = Pembayaran::where('keterangan', 'Lunas')->get();
        $paynt = Pembayaran::where('keterangan', 'Belum Lunas')->get();

        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');
    
        $pdf = new Dompdf($options);
        $html = View::make('payment.spp.pdf', compact('pay', 'paynt'))->render();
        $pdf->loadHtml('
        <html>
            <head>
                <link rel="stylesheet" href="/css/main.css">
                <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                
                td, th {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }

                title {
                    font-weight : 5px;
                    color : black;
                }
                </style>
            </head>
            <body>'. $html .'</body>
        </html>');

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
    
        $output = $pdf->output();
        $filename = 'payment.pdf';
    
        if ($request->input('action') == 'download') {
            return response()->download($output, $filename);
        }
    
        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="'.$filename.'"');
    }
}

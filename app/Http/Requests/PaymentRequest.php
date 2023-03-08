<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_petugas' => 'required|string',
            'nisn' => 'required|string',
            'tgl_bayar' => 'required|string',
            'id_spp' => 'required|string',
            'status_id' => 'required|string',
            'keterangan' => 'string',
            'lain_lain' => 'string',
            'jumlah_bayar' => 'required|string',
            'kembalian_bayar' => 'string',

        ];
    }
}

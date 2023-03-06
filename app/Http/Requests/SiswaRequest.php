<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nisn' => 'required', 'string', 'max:255',
            'nis' => 'required', 'string', 'max:255',
            'nama' => 'required', 'string',
            'id_kelas' => 'required', 'string',
            'alamat' => 'required', 'string',
            'no_telp' => 'required', 'string',
            'id_spp' => 'required', 'string',
        ];
    }
}

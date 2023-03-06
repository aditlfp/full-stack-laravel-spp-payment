<?php

namespace App\Http\Requests;

use App\Rules\NoGmailRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PetugasRequest extends FormRequest
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
            'username' => 'required|string', new NoGmailRule(),
            'password' => 'required|confirmed', Password::defaults(),
            'nama_petugas' => 'required|string', new NoGmailRule(),
            'level_id' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string',
            'no_telp' => 'required|string'
        ];
    }
}

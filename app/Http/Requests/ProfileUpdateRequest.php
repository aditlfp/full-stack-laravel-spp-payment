<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\NoGmailRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['string', 'max:255', new NoGmailRule()],
            'nama_petugas' => ['string', 'max:255', new NoGmailRule()],
        ];
    }
}

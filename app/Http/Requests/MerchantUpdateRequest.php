<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MerchantUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'logo' => 'file|image',
            'address' => 'string',
            'banner' => 'file|image',
            'description' => 'string',
            'ktp_number' => 'required|string|size:16',
            'npwp_number' => 'required|string|size:15',
            'siup_number' => 'required|string|size:13',
            'ktp' => 'file|image',
            'npwp' => 'file|image',
            'siup' => 'file|image',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MerchantUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update-merchantProfile');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'logo' => 'file|image',
            'address' => 'string',
            'banner' => 'file|image',
            'description' => 'string',
            'notes' => 'string',
            'ktp_number' => 'string|size:16',
            'npwp_number' => 'string|size:15',
            'siup_number' => 'string|size:13',
        ];
    }
}

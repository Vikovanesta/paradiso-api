<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class VoucherUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update-voucher', $this->voucher);
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
            'code' => 'string',
            'nominal' => 'numeric',
            'start_date' => 'date|date_format:Y-m-d|after_or_equal:today',
            'end_date' => 'date|date_format:Y-m-d|after_or_equal:start_date',
            'min_transaction' => 'numeric|min:0',
            'max_discount' => 'numeric|min:0|max:100',
            'quota' => 'numeric|min:1',
        ];
    }
}

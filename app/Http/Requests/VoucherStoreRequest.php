<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class VoucherStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create-voucher');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'voucher_type_id' => 'required|exists:voucher_types,id',
            'merchant_id' => 'required|exists:merchants,id',
            'name' => 'required|string',
            'code' => 'required|string',
            'nominal' => 'required|numeric',
            'start_date' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'end_date' => 'required|date|date_format:Y-m-d|after_or_equal:start_date',
            'min_transaction' => 'required|numeric|min:0',
            'max_discount' => 'required|numeric|min:0|max:100',
            'quota' => 'required|numeric|min:1',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return
        [
            'receipt_issuer' => 'required',
            'receipt_collection_method' => 'required',
            'receipt_credit_account' => 'required',
            'receipt_reason' => 'required',
            'recipient_name' => 'required',
            'recipient_phone' => 'required',
            'recipient_address' => 'required',
            'receipt_type' => 'required',
            'bank_name' => 'nullable',
            'check_number' => 'nullable',
            'total_amount' => 'required',
            'currency' => 'required',
            'supplier_name' => 'nullable',
            'supplier_no' => 'nullable',
            'tax_number' => 'nullable',
        ];
    }
}

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
            'receipt_collection_method' => 'required|in:مباشر',
            'receipt_credit_account' => 'required',
            'receipt_reason' => 'required',
            'recipient_name' => 'required',
            'recipient_phone' => 'required|max:11',
            'recipient_address' => 'required',
            'receipt_type' => 'required|in:نقدي,فيزا,شيك',
            'bank_name' => 'nullable',
            'check_number' => 'required_if:receipt_type,==,شيك',
            'total_amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'sub_total' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'total_tax' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'supplier_name' => 'required_with:spacial_params',
            'supplier_no' => 'required_with:spacial_params',
            'tax_number' => 'required_with:spacial_params',
            'cost.*.center'=>'nullable|required_with:cost_center|string',
            'cost.*.ratio'=>'nullable|required_with:cost_center|regex:/^\d+(\.\d{1,2})?$/|max:100',
            'cost.*.value'=>'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'debit.*.name'=>'required|string',
            'debit.*.amount'=>'required|regex:/^\d+(\.\d{1,2})?$/|max:100',
            'debit.*.currency'=>'required|string',
            'debit.*.tax'=>'required|regex:/^\d+(\.\d{1,2})?$/|max:100',
            'debit.*.total_amount'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}

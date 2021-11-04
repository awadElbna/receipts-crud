<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Receipt extends Model
{
    use HasFactory;

    protected $fillable=[
        'receipt_issuer',
        'receipt_collection_method',
        'receipt_credit_account',
        'receipt_reason',
        'recipient_name',
        'recipient_phone',
        'recipient_address',
        'receipt_type',
        'bank_name',
        'check_number',
        'total_amount',
        'total_tax',
        'sub_total',
        'supplier_name',
        'supplier_no',
        'tax_number',
    ];


    public function costs(){
        return $this->hasMany('App\Models\Cost','receipt_id');
    }
    public function debitAccounts(){
        return $this->hasMany('App\Models\DebitAccount','receipt_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitAccount extends Model
{
    use HasFactory;

    protected  $fillable=['name','amount','currency','tax','total_amount','receipt_id'];

    public function receipt()
    {
        return $this->belongsTo('Receipt','receipt_id');
    }

}

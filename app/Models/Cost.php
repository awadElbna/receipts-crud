<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Receipt;

class Cost extends Model
{
    use HasFactory;

    protected $fillable=['center','ratio','value','receipt_id'];

    public function receipt(){
        return $this->belongsTo('Receipt','receipt_id');
    }
}

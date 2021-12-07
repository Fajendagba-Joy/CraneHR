<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordTotal extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'grn_no',
        'item_info',
        'stk_qty',
        'qty',
        'rate',
        'total',
    ];
}

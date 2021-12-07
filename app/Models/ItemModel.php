<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    protected $fillable = [
        'item_info',
        'stk_qty',
        'rate',
    ];
}

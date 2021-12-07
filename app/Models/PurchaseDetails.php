<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'grn_no', 
        'vendor', 
        'invoice_no', 
        'payment_type', 
        'purchase_date', 
        'store', 
        'details', 
        'stock', 
        'second_total', 
        'discount', 
        'grand_total', 
        'paid_amount', 
        'due_amount',
    ];
}

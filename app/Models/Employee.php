<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'phone',
        'designation',
        'email',
        'address',
        'state',
        'city',
        'country',
        'blood_group',
        'dob',
        'picture',
        'guarantors_name',
        'guarantors_address',
        'guarantors_phone',
        'guarantors_status',
    ];
}

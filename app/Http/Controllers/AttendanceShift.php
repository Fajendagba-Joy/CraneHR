<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class AttendanceShift extends Controller
{
    public function __construct () {
        $this->middleware(['auth']);
    }

    public function index () {
        return view('attendance.shiftsettings');
    }
}

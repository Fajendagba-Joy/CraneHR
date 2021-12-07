<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rats\Zkteco\Lib\ZKLibrary;

class DeviceController extends Controller
{
    public function disconnect () 
    {
        ini_set('max_execution_time', 120);
        
        $zk = new ZKLibrary('192.168.1.201', 4370, 'TCP');
        if ($zk->disconnect()) {
            back();
        }
    }
}

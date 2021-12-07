<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Support\Collection;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Rats\Zkteco\Lib\zklibrary;
use Throwable;

class AttendanceController extends Controller
{
    public function __construct () {
        $this->middleware(['auth']);
    }

    public function index () {
        $attendance_log = Attendance::orderBy('time_in', 'desc')->paginate(4);        
        return view('attendance.index', [
            'attendance_log' => $attendance_log,
        ]);
    }

    public function clearLog() {
        ini_set('max_execution_time', 120);
        
        $zk = new zklibrary('192.168.1.201', 4370, 'TCP');
        if ($zk->connect()) 
        {
            $zk->clearAttendance();
            return redirect()->route('attendance');

        } else {
            return "Device not connected";
        }
    }

    public function update () 
    {
        ini_set('max_execution_time', 120);
        
        $zk = new zklibrary('192.168.1.201', 4370, 'TCP');
        
        if ($zk->connect()) {

            $this -> device_status = true;

            try {
                // dd($zk->getUser());
                $attendance_log = $zk -> getAttendance();
                $attendance_log = array_reverse($attendance_log);

            } catch (\Throwable $e) {
                $attendance_log = [];
            }

            $user = $zk->getUser();            

            foreach ($attendance_log as $attendance){

                $type = "Fingerprint";
                if ($attendance_log[2] == 4)
                {
                    $type = "RF Card";
                }

                // First check if the record already exist
                Attendance::firstOrCreate(
                    ['time_in' => $attendance[3], 'name' => $user[$attendance[0]][1]],
                    [
                        'name' => $user[$attendance[0]][1],
                        'user_id' => $attendance[0],
                        'type' => $type,
                        'time_in' => $attendance[3],
                    ]
                );
                /*
                Attendance::create([
                    'name' => $user[$attendance[0]][1],
                    'user_id' => $attendance[0],
                    'type' => $type,
                    'time_in' => $attendance[3],
                ]); */
            }
            return redirect()->route('attendance');
        } else {
            $this -> device_status = false;
            return "Device not connected";
        }
    }

    // Add a user details view
    public function adduser () 
    {
        return view('attendance.adduser');
    }

    // Store user added in the attendance device
    public function storeuser(Request $request) 
    {
        
        ini_set('max_execution_time', 120);        
        $zk = new zklibrary('192.168.1.201', 4370, 'TCP');

        if ($zk->connect()) {
            $user = $zk->getUser();

            $last_item = last($user);

            // $last_item = $last_item[1][2];

            dd($last_item);
        }

        

        /*

        if ($zk->connect()) {

            $this -> device_status = true;
            try {
                $adduser = $zk -> setUser($uid, $user_id, $name, $password, $role);
            } catch (\Throwable $e) {
                $attendance_log = '0';
            }

            $user           = $zk->getUser();
            // lastIndexOf
            $attendance_log = $zk->getAttendance();
            return view('attendance.index', [
                'attendance_log'    => $attendance_log,
                'user'              => $user,
            ]);
            
            
        } else {
            $this -> device_status = false;
            return "Device not connected";
        }*/

    }

}

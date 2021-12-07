<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Rats\Zkteco\Lib\zklibrary;

class EmployeeController extends Controller
{
    public function __construct () {
        $this->middleware(['auth']);
    }

    public function index() {
        /*
        ini_set('max_execution_time', 120);
        
        $zk = new zklibrary('192.168.1.201', 4370, 'TCP');
        if ($zk->connect()) {
            // $zk->setUser(3, 2, 'Olabayo', 1101, 14);
            // $attendance = $zk -> deleteUser(4);
            // $attendance = $zk->getUser();

            // $zk->setuser()
            // $zk->setuser(4,15,'ISR', '1111', 0);

            // Copy all user from DB to machine

            // $attendance = $zk -> deleteUser(4);
            //  $zk -> deleteUser(3);
            
            //  $zk->clearAttendance();
            
            return $zk -> getAttendance();
        } else {
            return "Device not connected";
        } */        
        
        $employees = Employee::paginate(2);
        return view('employees.index', [
            'employees' => $employees,
            // 'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    public function store (Request $request) {

        // dd($request->only('email', 'password')); //dd mean Dump and Die

        $this->validate($request,
        [
            'first_name'=> 'required|max:255',
            'middle_name'=> 'max:255',
            'last_name'=> 'required|max:255',
            'sex' => ['nullable', 'string', 'in:male,female'],
            'phone' => ['nullable', 'string', 'min:11'],
            'designation'=> 'required|max:255',
            'email'=> 'nullable|email|max:255|unique:employees',
            'address'=> 'max:255',
            'state' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'blood_group' => ['nullable', 'string', 'max:255'],
            'dob' => ['nullable', 'string', 'max:255'],
            
            'guarantors_name' => ['string', 'max:255'],
            'guarantors_address' => ['string', 'max:255'],
            'guarantors_phone' => ['string', 'min:11'],
            'guarantors_status' => ['string', 'in:active, inactive'],
        ]);

        // dd($request->dob);
        Employee::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'designation' => $request->designation,
            'email' => $request->email,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'country' => $request->country,
            'blood_group' => $request->blood_group,
            'dob' => $request->dob,

            'guarantors_name' => $request->guarantors_name,
            'guarantors_address' => $request->guarantors_address,
            'guarantors_phone' => $request->guarantors_phone,
            'guarantors_status' => $request->guarantors_status,
        ]);

        return redirect()->route('employee');
        return response()->json([
            'success' => 'Employee Added Successfully'
        ], 400);
    }

    public function edit (Employee $employee, $id) {
        $employee->find($id);
        return view('employees.edit')->with('employee', $employee);
    }
}

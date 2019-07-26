<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\ActivationlinkEvent;
use Illuminate\Http\Request;
use App\Notifications\UserActive;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Models\employees;
use DataTables;
use App\Http\Controllers\Controller;
use Session;
use Closure;
class AdminController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
# -------------- Employee ----------

    public function getAllQPRUPloaded(Request $request) {
        $emp_data = employees::select('*')->get();
        $vars = $request->post();
        //$list = $this->employees->getAllUploadedQprforState($vars);
        return view('datatables', ['empData' => $emp_data]);
    }

    public function getAllEmployeeloaded() {
        return view('datatables');
    }

    public function dashboard() {
         if(Auth::user()->role_id == 3){
        return view('admin/index');
         }
         else {
             return view('errors/404');
         }
         
    }

    public function adminDashboard() {
        $emp_data = employees::select('*')->get();
        return view('admin/adminDashboard', ['empData' => $emp_data]);
    }

    public function addEmployee(Request $request) {
        if (request()->ajax()) {
            $posts = $request->post();
            $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $generatedPass = substr(str_shuffle($keyspace), 0, 8);
           
            if( User::where('email', $posts['empEmail'])->exists()){
              return response()->json(array('message' => 'user_exists'));
            }  
//          add into user table
            $users = new User();
            $users->name = $posts['empValue'];
            $users->email = $posts['empEmail'];
            $users->password = bcrypt($generatedPass);         
            $users->role_id = '2';
            $users->token = str_random(40) . time();

//          add into employee table           
            $employee = new employees();
            $employee->name = $posts['empValue'];
            $employee->email = $posts['empEmail'];
            $employee->password = bcrypt($generatedPass);
            $employee->contact = $posts['empContact'];
            $employee->last_login = date('Y-m-d h:i:s');
            $employee->status = $posts['status'];

            if ($employee && $users) {
                $users->save();
                $employee->user_id = $users->id;
                $employee->save();
                if ($employee->status == 1) {
                    $users->notify(new UserActive($users,$generatedPass));
                    return response()->json(array('message' => 'success', 'employeeData' => $employee));
                }
                if ($employee->status == 0) {
                    return response()->json(array('message' => 'success', 'employeeData' => $employee));                
           } else {
                return response()->json(array('error' => 'something went wrong!!'));
            }

        }
        }
    }

public function editEmployee(Request $request) {
    if ($request->ajax()) {
        $id = $request->empIds;
        $empData = employees::where('id', $id)->first();
        if ($empData) {
            return response()->json(array('message' => 'success', 'emp_data' => $empData));
        } else {
            return response()->json(array('error' => 'Something went Wrong!!'));
        }
    }
}

public function updateEmp(Request $request) {
    if ($request->isMethod('post') && $request->ajax()) {
        $posts = $request->post();
        $usrData = User::findorfail($posts['user_id']);
        if ($usrData) {
            $usrData->name = $posts['emp_name'];
            $usrData->email = $posts['emp_email'];
        }
        $emp_data = employees::findOrFail($posts['id']);
        if ($emp_data) {
            $emp_data->id = $posts['id'];
            $emp_data->user_id = $posts['user_id'];
            $emp_data->name = $posts['emp_name'];
            $emp_data->email = $posts['emp_email'];
            $emp_data->contact = $posts['emp_cnt'];
            $emp_data->status = $posts['sts'];
        }
        if ($usrData && $emp_data) {
            $usrData->save();
            $emp_data->save();
            return response()->json(array('messsage' => 'success', 'usr_data' => $usrData, 'emp_data' => $emp_data));
        } else {
            return response()->json(array('error' => 'Something went wrong'));
        }
    }
}

public function removeEmployee(Request $request) {
    if (request()->ajax()) {

        $empDelete = employees::where('id', $request->empid)->first();
        $userData = User::where('id', $empDelete->user_id)->first();
        if ($empDelete && $userData) {
            $empDelete->delete();
            $userData->delete();
            return response()->json(array('message' => 'success'));
        } else {
            return response()->json(array('error' => 'something went wrong!!'));
        }
    }
}

public function index() {

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
//
    }

}

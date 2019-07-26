<?php
namespace App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\customer_orders_model;
use App\Models\videos_model;
use App\Models\music_model;
use App\Models\gender_model;
use App\Models\masters_model;
use Illuminate\Http\Request;
use App\Events\VideoUploadedEvent;
use App\Notifications\videoUploaded;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller 
{
        
      public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard() {
        if(Auth::user()->role_id == 2){
        return view('employee/dashboard');
        }
        else{
            return view('errors/404');
        }
    }
   
    public function viewOrders(Request $request) {
        $customerOrder = customer_orders_model::select('*')
                ->with('getVideos')
                ->with('getGender')
                ->with('getMusic')
                ->paginate(10);
                
       return view('employee/orders', ['customerOrders' => $customerOrder]);
       }
    
    public function viewOrderByEmp(Request $request ,$id){        
        $viewOrderDetails = customer_orders_model::select('*')
                ->with('getVideos')
                ->with('getGender')
                ->with('getMusic')
                ->findorfail($id);      
        return view('employee/viewOrderDetails')->with(['orderDetails' => $viewOrderDetails]);
    }
    
    public function assignedOrderByEmp(Request $request) {
        if ($request->isMethod('post') && $request->ajax()) {
            $posts = $request->post();
            $orderId = $posts['order_id'];           
            $empId = $posts['emp_id'];           
            $custOrder = customer_orders_model::findorfail($orderId);            
            if( empty($custOrder->is_assigned) && $custOrder->is_assigned == NULL ){
                $custOrder->is_assigned = $empId;
                $custOrder->save();
            }
         }
        if ($custOrder) {
            return response()->json(array('message' => 'success', 'empId' => $empId, 'orderId' => $orderId));
        } else {
            return response()->json(array('error' => 'Something went wrong!!'));
        }
    }

    public function rejectOrderByEmp(Request $request) {
        if ($request->isMethod('post') && $request->ajax()) {
            $posts = $request->post();
            $ordrid = $posts['order_id'];
            $orders = customer_orders_model::findorfail($ordrid);
            $orders->is_assigned = NULL;
            $orders->save();
        }
        if ($orders) {
            return response()->json(array('message' => 'success', 'order_id' => $ordrid));
        } else {
            return response()->json(array('error' => 'Something went wrong!!'));
        }
    }
    
      public function videoUploadByEmp(Request $request) {
        if ($request->isMethod('post') && $request->ajax()) {
            $posts = $request->post();
            $orderId = $posts['orderid'];
            if ($file = $request->file('video')) {
                $path = public_path() . "/img/video";
                $priv = 0777;
                if (!file_exists($path)) {
                    mkdir($path, $priv) ? true : false;
                }
                $name = uniqid($file->getClientOriginalName());
                $file->move($path, $name);
                $findOrder = customer_orders_model::findorfail($orderId);
                $custId = $findOrder->customer_id;
                $userid  = User::findorfail($custId);                
                $findOrder->employe_video = trim("/img/video/" . $name);
                $findOrder->save();
            }
        }
        if ($findOrder) {
            $userid->notify(new videoUploaded($userid));
            return response()->json(array('message' => 'success'));
        } else {
            return response()->json(array('error' => 'Something went wrong!!'));
        }
    }
    
    public function proceedOrderByEmp(Request $request) {
        if ($request->isMethod('post') && $request->ajax()) {
            $posts = $request->post();
            $proOrdrid = $posts['procedOrdrId'];
            $proedOrders = customer_orders_model::findorfail($proOrdrid);
            $tomorrow = date("l", strtotime('tomorrow'));
            $dayAftrTom = date('l', strtotime('+2 day'));        
            $dayAftrTom_1 = date('l', strtotime('+3 day')); 
            if($tomorrow == 'Saturday'){
                $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P5D'));
                $proedOrders->order_assign_time = $dayAfterTomorrow;
            }elseif( $dayAftrTom == 'Saturday' ){
                 $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P5D'));
                $proedOrders->order_assign_time = $dayAfterTomorrow;
            }elseif( $dayAftrTom_1 == 'Saturday'){
                 $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P5D'));
                $proedOrders->order_assign_time = $dayAfterTomorrow;
            }else{
                $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P3D'));
                $proedOrders->order_assign_time = $dayAfterTomorrow;
            }
            $proedOrders->order_counter = true;
            $proedOrders->save();
        }
        if ($proedOrders) {
            return response()->json(array('message' => 'success'));
        } else {
            return response()->json(array('error' => 'Something went wrong!!'));
        }
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

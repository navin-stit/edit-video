<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\customer_orders_model;
use App\Models\masters_model;
use App\Models\gender_model;
use App\Models\music_model;
use App\Models\videos_model;
use App\Service;
use DB;
use App\Models\non_subscribe_member_model;
use App\Models\subscribe_member_model;
use App\Order;
use App\PayPal;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCreateVideos(Request $request, $id = NULL) {
        $masters = masters_model::select('*')->get();
        $gender = gender_model::select('*')->get();
        $music = music_model::select('*')->get();
        if (!empty($id) && $id != NULL) {
            $cusOrdrid = customer_orders_model::findorfail($id);
        } else {
            $cusOrdrid = '';
        }

        return view('create-video')->with(['master' => $masters, 'gender' => $gender, 'music' => $music, 'selectdOrder' => $cusOrdrid]);
    }

    public function faq() {
        return view('/faq');
    }

    public function customerlist() {
        $customer = customer_orders_model::get();
        return view('customer/customerdashboard')->with('customer', $customer);
    }

    public function downloadvideo($videoId) {
        echo $videoId;
    }

    public function storeFirstPageData(Request $request) {
        if (request()->ajax()) {
            $posts = $request->post();
            if ($request->custOrderId == '' && $request->custOrderId == NULL) {
                $customerData = new customer_orders_model();
                $customerData->image_id = $posts['imgId'];
                $customerData->gender = $posts['genderId'];
                $customerData->music = $posts['musicId'];
                $customerData->product_link = $posts['productLink'];
                $customerData->customer_id = $posts['cust_id'];
                $customerData->save();
                $cust_orderId = $customerData->id;
            } else {
                if (!empty($request->custOrderId) && $request->custOrderId != NULL) {
                    $custOrdr = customer_orders_model::findorfail($request->custOrderId);
                    $custOrdr->image_id = $posts['imgId'];
                    $custOrdr->gender = $posts['genderId'];
                    $custOrdr->music = $posts['musicId'];
                    $custOrdr->product_link = $posts['productLink'];
                    $custOrdr->customer_id = $posts['cust_id'];
                    $custOrdr->save();
                    $cust_orderId = $request->custOrderId;
                }
            }
        }
        if ($request->custOrderId == '' && $request->custOrderId == NULL && $customerData) {
            return response()->json(array('message' => 'success', 'cusOrderId' => $cust_orderId));
        } else if (!empty($request->custOrderId) && $request->custOrderId != NULL && $custOrdr) {
            return response()->json(array('message' => 'success', 'cusOrderId' => $cust_orderId));
        } else {
            return response()->json(array('error' => 'Something went wrong !!'));
        }
    }

    public function selectVideo(Request $request, $id = NULL) {
        $videos = videos_model::select('*')->get();
        $cusOrderId = $request->id;
        return view('select-video')->with(['videos' => $videos, 'CusId' => $cusOrderId]);
    }

    public function storeSelectVideoData(Request $request) {

        if (request()->ajax()) {
            $posts = $request->post();
            $customerId = $request->_orderIdForMusic;
            $selectdVideoByCust = $request->selectedVdeo;
            $customerOrder = customer_orders_model::findorfail($customerId);
            $customerOrder->video_id = $selectdVideoByCust;
            $customerOrder->save();
            if ($file = $request->file('music')) {
                $path = public_path() . "/img/order_music";
                $priv = 0777;
                if (!file_exists($path)) {
                    mkdir($path, $priv) ? true : false; //
                }
                $name = $file->getClientOriginalName();
                $file->move($path, $name);
                if (!empty($customerId)) {
                    $custumrOrdMusic = customer_orders_model::findorfail($customerId);
                    $custumrOrdMusic->music_type = trim('img/order_music/' . $name);
                    $custumrOrdMusic->save();
                }
            }
            if ($file = $request->file('logo')) {
                $path = public_path() . "/img/order_logo";
                $priv = 0777;
                if (!file_exists($path)) {
                    mkdir($path, $priv) ? true : false; //
                }
                $logoName = $file->getClientOriginalName();
                $file->move($path, $logoName);
                if (!empty($customerId)) {
                    $custumrOrdLogo = customer_orders_model::findorfail($customerId);
                    $custumrOrdLogo->logo = 'img/order_logo/' . $logoName;
                    $custumrOrdLogo->save();
                }
            }
        }
        if ($customerOrder) {
            return response()->json(array('message' => 'success', 'cus_id' => $customerId));
        } else {
            return response()->json(array('error' => 'Something went wrong!!'));
        }
    }

    public function bakToCreateVideo(Request $request) {
        if (request()->ajax()) {
            $posts = $request->post();
            $id = $posts['cusOrderId'];
            $selectdOrderByCust = customer_orders_model::findorfail($id);
        }
        if ($selectdOrderByCust) {
            return response()->json(array('message' => 'success', 'cusSelectdOrder' => $selectdOrderByCust));
        } else {
            return response()->json(array('error' => 'Something went wrong!!'));
        }
    }

    public function customerVideoVariation(Request $request, $id = NULL) {
        $customer_id = Auth::user()->id;
        $subsMember = subscribe_member_model::select('*')->get();
        $nonSubsMember = non_subscribe_member_model::select('*')->get();
        $transaction_id = rand(10000000, 99999999);
        $orderId = request()->route('id');
        if (!empty($orderId)) {
            $custOrderStatus = customer_orders_model::findorfail($orderId);
        }
        $custOrdId = '';
        if ($custOrderStatus->customer_id == $customer_id) {
            if ($custOrderStatus->status == 1) {

                $custOrdId = $custOrderStatus;
            }
        }

        return view('video-variations')->with(['subs' => $subsMember, 'nonSubs' => $nonSubsMember, 'transaction_id' => $transaction_id, 'custOrderStatus' => $custOrdId]);
    }

    public function subscribeMember(Request $request) {
        if (request()->ajax()) {
            $posts = $request->post();
            #customer order_table         
            $cusOrderId = $posts['cus_orderId'];
            $cusOrder = customer_orders_model::findorfail($cusOrderId);
            $cusOrder->subscribe = $posts['sub_planPrice'];
            $cusOrder->status = '1';
            $cusOrder->save();

            #Services table
            $services = new Service();
            $services->amount = $posts['sub_planPrice'];
            $services->created_at = date('Y-m-d h:i:s');
            $services->updated_at = date('Y-m-d h:i:s');
            $services->save();
        }

        if ($cusOrder && $services) {
            $service = Service::findOrFail($services->id);
            $user_id = Auth::user()->id;
            #order_table
            $order = new Order;
            $transactionId = $posts['transaction_id'];
            $order->user_id = $user_id;  //user id
            $order->transaction_id = $transactionId;
            $order->service_id = $services->id;
            $order->amount = $service->amount;
            $order->save();
            return response()->json(array('message' => 'success', 'subscribeId' => $services->id, 'transaction_id' => $transactionId));
        } else {
            return response()->json(array('error' => 'Something went wrong!!'));
        }
    }

    public function UnsubscribeMember(Request $request) {
        if (request()->ajax()) {
            $posts = $request->post();
            #customer order_table  
            $cusOrderId = $posts['cus_orderId'];
            $cusOrder = customer_orders_model::findorfail($cusOrderId);
            $cusOrder->Unsubscribe = $posts['unsub_planPrice'];
            $cusOrder->status = '0';
            $cusOrder->save();

            #Services table
            $services = new Service();
            $services->amount = $posts['unsub_planPrice'];
            $services->created_at = date('Y-m-d h:i:s');
            $services->updated_at = date('Y-m-d h:i:s');
            $services->save();
        }

        if ($cusOrder && $services) {
            $service = Service::findOrFail($services->id);
            $user_id = Auth::user()->id;
            #order_table
            $order = new Order;
            $transactionId = $posts['_transId'];
            $order->user_id = $user_id;  //user id
            $order->transaction_id = $transactionId;
            $order->service_id = $services->id;
            $order->amount = $service->amount;
            $order->save();
            return response()->json(array('message' => 'success'));
        } else {
            return response()->json(array('error' => 'Something went wrong!!'));
        }
    }

    public function addCustomerComment(Request $request) {
        if (request()->ajax()) {
            $posts = $request->post();
            $orderIdForComment = $posts['orderIdCom'];
            $findOrderForComment = customer_orders_model::findorfail($orderIdForComment);
            $findOrderForComment->customer_comment = $posts['commentValue'];
            $findOrderForComment->save();
        }
        if ($findOrderForComment) {
            return response()->json(array('message' => 'success', 'orderIdForComment' => $orderIdForComment));
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

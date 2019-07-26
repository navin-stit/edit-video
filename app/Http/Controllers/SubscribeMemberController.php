<?php

namespace App\Http\Controllers;
use App\Models\subscribe_member_model;
use App\Models\non_subscribe_member_model;
use Illuminate\Http\Request;

class SubscribeMemberController extends Controller
{
    public function subscribememberlist()
    {
      
       $member = subscribe_member_model::get();
       $nonmember = non_subscribe_member_model::get();
	  return view("get-started",['sub_member'=>$member,'nonsub_member' =>$nonmember]);
    }
}

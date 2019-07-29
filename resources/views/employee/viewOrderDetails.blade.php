@extends('layouts.elements.layout')
@include('layouts.elements.sidebar')
@section('content')
 <div class="fadeInWindow"></div>
<style>
body.skin-blue.sidebar-mini {background: #ecf0f5;}
    ul.list-group{box-shadow: 0px 4px 9px #cacaca; width: 56%; margin: auto; margin-top: 40px;  margin-bottom: 40px;}
    ul.list-group li.list-group-item{font-size: 16px; padding: 13px;}
    ul.list-group li.list-group-item span {font-weight: bold;}
    .paddingss{padding: 20px !important;}
    .proLink:hover{
        text-decoration: underline;
    }
    .proImage:hover{
        transform: scale(3,5);
        position: relative;
        z-index: 999999;
    }
    .proVideo:hover {
        transform: scale(1,2);
        position: relative;
        z-index: 999999;
        border:2px solid #333;        
    }
/*    .fadeInWindow {
        width: 100%;min-height: 150vh;background-color:#333;
        opacity:.5;position: absolute;z-index: 999999999;display: none;
    }
 .proVideo:hover + .fadeInWindow
{
    display: block;
}*/
</style>
<!--order details-->
<ul class="list-group" style="" id="showData">                   
    <li class="list-group-item" style="word-break: break-all;height: auto!important"><b>Product Link :</b>                                                 
        <a href="{{ $orderDetails->product_link }}" class="proLink">{{ $orderDetails->product_link }}</a> 
    </li>
    <li class="list-group-item"> <b>Layout :</b> 
        <img src=" {{ asset('img/'.$orderDetails->getImageData->img) }}" class="proImage" width="50px" height="auto">
    </li>                                        
    <li class="list-group-item"  style="height: auto!important"><b>Description :</b>
        {{ $orderDetails->getImageData->description }}
    </li>
    <li class="list-group-item"><b>Size :</b> 
        {{ $orderDetails->getImageData->image_size }}
    </li>                    
    <li class="list-group-item" id="selectdGndr"><b>Gender :</b>  {{ $orderDetails->getGender->gender }}                     
    </li>
    <li class="list-group-item" style="">                      
        <span>Video Style :</span> 
        @if(!empty($orderDetails->getVideos))
        <video class="video-fluid increaseSizeOnHover proVideo" autoplay="" loop="" muted="" style="width:71%;">
            <source src="{{ $orderDetails->getVideos->links }}" type="video/mp4" width="50px" height="auto">
        </video>
        
        @else
        <img src="{{ asset('img/user_image/maxresdefault.jpg') }}"height="100px"> 
        @endif
    </li>
    <li class="list-group-item"><b>Logo :</b> 
        @if(!empty($orderDetails->logo))
        <img src="{{  asset($orderDetails->logo) }}" height="100px">                        
        @else
        <img src="{{ asset('img/order_logo/not_available.jpg') }}" height="100px"> 
        @endif
    </li>
     <li class="list-group-item paddingss">
         <a href="{{ route('employee/orders') }}" class="btn btn-primary" style="width: 100%;">Back To Orders</a>
    </li>
</ul>  


@endsection
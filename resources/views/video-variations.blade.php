@extends('layouts.partials.header')
@section('content')
<section>
 <img class="hero-bg-top" src="{{asset('public/img/bg-top-left.svg')}}" alt="top left icon" aria-hidden="true">
<div class="nextAfterSubscribe"></div>
<input type="hidden" name="" value="{{ $transaction_id }}" id="transactionId">
 <div class="left-blue-blob" style=""></div>
  <div class="right-red-blob-two"></div>
<div class="container m-50 mb-4 mtop-70">
    <h3 class="text-center"><span class="selectvideo"><b>Video Variations </b></span></h3>
    <a href="{{url('/recuring')}}"><input type="button" name="btn" value="Recuring"></a>
    <div class="row">        
        @if( !empty($custOrderStatus->subscribe) && $custOrderStatus->status == 1)       
        <div class="col-lg-1 col-md-1 mb-md-0 mb-4"></div>
        <!-- Grid column -->
        
        <div class="col-lg-5 col-md-5 mb-lg-0 mb-4 mx-auto">

            <!-- Pricing card -->
            <div class="card pricing-card">

                <!-- Price -->

                <div class="price header white-text blue rounded-top">
                    <h2 class="number">26.50/per month</h2>
                    <div class="version">
                        <h5 class="mb-0">Video Variations Needed</h5>
                    </div>
                </div>

                <!-- Features -->
                <div class="card-body striped mb-1">
                    <ul>
                        @foreach($subs as $subsMemberVar)
                        <li>             
                            <p>
                                <i class="fas fa-check green-text pr-2"></i>
                                {{ $subsMemberVar->video_type }}
                            </p>           
                        </li>
                        @endforeach
                    </ul>
                    <a href="javascript:void(0);">
                        <button class="btn btn-blue subscribePlanPrice" orderId="{{ request()->route('id') }}" >PRICE: $26.50</button>
                    </a>

                </div>
                <!-- Features -->

            </div>
            <!-- Pricing card -->
        </div>
        <!-- Grid column -->
       
        @else         
        <div class="col-lg-1 col-md-1 mb-md-0 mb-4"></div>
        <!-- Grid column -->
        
        <div class="col-lg-5 col-md-5 mb-lg-0 mb-4">

            <!-- Pricing card -->
            <div class="card pricing-card">

                <!-- Price -->

                <div class="price header white-text blue rounded-top">
                    <h2 class="number">26.50/per month</h2>
                    <div class="version">
                        <h5 class="mb-0">Video Variations Needed</h5>
                    </div>
                </div>

                <!-- Features -->
                <div class="card-body striped mb-1">
                    <ul>
                        @foreach($subs as $subsMemberVar)
                        <li>             
                            <p>
                                <i class="fas fa-check green-text pr-2"></i>
                                {{ $subsMemberVar->video_type }}
                            </p>           
                        </li>
                        @endforeach
                    </ul>
                    <a href="javascript:void(0);" class="pricebtn-both">
                        <button class="btn btn-blue subscribePlanPrice waves-effectss" orderId="{{ request()->route('id') }}" >PRICE: $26.50</button>
                    </a>

                </div>
                <!-- Features -->

            </div>
            <!-- Pricing card -->
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-lg-5 col-md-5 mb-md-0 mb-4">

            <!-- Pricing card -->
            <div class="card pricing-card">

                <!-- Price -->
                <div class="price header white-text indigo rounded-top">
                    <h2 class="number">0.00/per month </h2>
                    <div class="version">
                        <h5 class="mb-0">Stopscolls Needed</h5>
                    </div>
                </div>

                <!-- Features -->
                <div class="card-body striped mb-1">

                    <ul>
                        @foreach($nonSubs as $nonSubMemberVar)
                        <li>
                            <p>
                                <i class="fas fa-check green-text pr-2"></i>{{ $nonSubMemberVar->video_type}}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                    <a href="javascript:void(0);" class="pricebtn-both">
                        <button class="btn btn-indigo unsubscribePlanPrice waves-effectss "  orderId="{{ request()->route('id') }}">PRICE: $45.99</button>
                    </a>
                    
                </div>
                <!-- Features -->

            </div>
            <!-- Pricing card -->
        </div>
        <!-- Grid column -->
        @endif
        <div class="col-lg-1 col-md-1 mb-md-0 mb-4"></div>
    </div>
</div>
</section>
<section class="hero-bg-section2 mt-0">
  <img class="hero-bg-bottom" src="{{asset('public/img/right-blue_morph.svg')}}" alt="blue icon" aria-hidden="true">
</section>



 <div class="gateway--paypal" style="display: none;">
                <form method="POST" action="{{ route('checkout.payment.paypal', ['transaction_id' => encrypt($transaction_id)]) }}" id="frm_paypal">
                    {{ csrf_field() }}
                    <button class="btn btn-pay">
                        <i class="fa fa-paypal" aria-hidden="true"></i> Pay with PayPal
                    </button>
                </form>
 </div>
  <div class="gateway--paypal" style="display: none;">
    <form method="GET" action="{{ route('paypal.eccheckout') }}" id="frm_paypal_recurring">
        {{ csrf_field() }}
        <input type="hidden" value="recurring" id="mode" name="mode"/>
        <button class="btn btn-pay">
            <i class="fa fa-paypal" aria-hidden="true"></i> Pay with PayPal
        </button>
    </form>
 </div>

@endsection

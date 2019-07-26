<!DOCTYPE html>
<html lang="en">
@extends('layouts.partials.header')
@section('content')
<section>
<img class="hero-bg-top" src="img/bg-top-left.svg" alt="top left icon" aria-hidden="true">  
<div class="left-blue-blob" style=""></div>
<div class="right-red-blob-two"></div>
<div class="container m-50 mb-4 mtop-70">
  <div class="row m-d">
    <div class="col-lg-1 col-md-1 mb-md-0 mb-4"></div>
    <!-- Grid column -->
    <div class="col-lg-5 col-md-5 mb-lg-0 mb-4">

      <!-- Pricing card -->
      <div class="card pricing-card m-d">

        <!-- Price -->
        <div class="price header white-text blue rounded-top">
          <h2 class="number">26.50/per month</h2>
          <div class="version">
            <h5 class="mb-0">Subscribed Members</h5>
          </div>
        </div>

        <!-- Features -->
        <div class="card-body striped mb-1">
          <ul>
           
            @foreach($sub_member as $member)
            <li>
              <p><i class="fas fa-check green-text pr-2"></i>{{$member->video_type}}</p>
            </li>
            @endforeach
          </ul>
        
       <a href="{{url('create-video')}}"  class="pricebtn-both"><button  class="btn waves-effectss btn-indigo">PRICE: $26.50</button></a>
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
            <h5 class="mb-0">Non- Members</h5>
          </div>
        </div>

        <!-- Features -->
        <div class="card-body striped mb-1">

          <ul>
            
            
              @foreach($nonsub_member as $nonmember)
            
              <li>
              <p><i class="fas fa-check green-text pr-2"></i>{{$nonmember->video_type}}</p>
            </li>
           @endforeach
            
          </ul>
        
          <a href="{{url('/create-video')}}" class="pricebtn-both"><button  class="btn waves-effectss btn-indigo">PRICE: $45.99</button></a>

        </div>
        <!-- Features -->

      </div>
      <!-- Pricing card -->
    </div>
    <!-- Grid column -->
    <div class="col-lg-1 col-md-1 mb-md-0 mb-4"></div>
  </div>
</div> 
</section>
<section class="hero-bg-section2">
  <img class="hero-bg-bottom" src="img/right-blue_morph.svg" alt="blue icon" aria-hidden="true">
</section>
@endsection
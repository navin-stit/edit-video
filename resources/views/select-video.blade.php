@extends('layouts.partials.header')
@section('content')
<section>
  <img class="hero-bg-top" src="{{asset('public/img/bg-top-left.svg')}}" alt="top left icon" aria-hidden="true">

<div id="wrapper">
<input type="hidden" value="{{request()->route('id')}}" id="cusOrderId">
<div class="container m-50 mb-4 mtop-70" id="firstSectionContent">
    <h3 class="text-center"><span class="selectvideo"><b>Select Video Style</b></span></h3>
        <div class="row">
            <div class="col-lg-1 col-md-1 mb-md-0 mb-4 title"></div>
            <div class="col-lg-6 col-md-1 mb-md-0 mb-4 title">
                <!--Carousel Wrapper-->
                <div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
                        <li data-target="#video-carousel-example2" data-slide-to="1"></li>
                        <li data-target="#video-carousel-example2" data-slide-to="2"></li>
                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                        @php $counter = 1;@endphp
                        @foreach( $videos as $video )
                        @if( $counter == 1 )
                        <!-- First slide -->
                        <div class="carousel-item active " id="video_{{ $video->id }}">
                            <!--Mask color-->
                            <div class="view">
                                <!--Video source-->
                                <video class="video-fluid" autoplay loop muted >
                                    <source src="{{ $video->links }}" type="video/mp4" id="link_{{ $video->id }}" />
                                </video>
                                <div class="mask rgba-indigo-light"></div>
                            </div>

                            <!--Caption-->
                            <div class="carousel-caption">
                                <div class="animated fadeInDown">
                                    <h3 class="h3-responsive">{{ $video->name }}</h3>
                                    <p>{{ $video->description }}</p>
                                </div>
                            </div>
                            <!--Caption-->
                        </div>
                        @else
                        <div class="carousel-item " id="video_{{ $video->id }}">
                            <!--Mask color-->
                            <div class="view">
                                <!--Video source-->
                                <video class="video-fluid" autoplay loop muted>
                                    <source src="{{ $video->links }}" type="video/mp4" id="link_{{ $video->id }}"/>
                                </video>
                                <div class="mask rgba-indigo-light"></div>
                            </div>

                            <!--Caption-->
                            <div class="carousel-caption">
                                <div class="animated fadeInDown">
                                    <h3 class="h3-responsive">{{ $video->name }}</h3>
                                    <p>{{ $video->description }}</p>
                                </div>
                            </div>
                            <!--Caption-->
                        </div>
                        @endif
                        @php $counter++; @endphp
                        @endforeach
                        <!-- /.First slide -->
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="btn-floating waves-effect waves-light smll" href="#video-carousel-example2" data-slide="prev"><i class="fas fa-chevron-left"></i></a>

                    <a class="btn-floating waves-effect waves-light smll small2" href="#video-carousel-example2" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                    <!--/.Controls-->
                </div>
                <!--Carousel Wrapper-->
                <div class="text-center mt-2">
                    <a href="javascript:void(0);" class="Selectbtn">
                        <button class="btn waves-effectss btn-blue waves-effect waves-light selectdVideo">Select</button>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-1 col-md-1 mb-md-0 mb-4 title"></div>
            <div class="col-lg-3 col-md-1 mb-md-0 mb-4 title inp-fil-section">
                  <form class="md-form mb-5"  method="POST" action="{{ route('save.logo') }}"  enctype ='multipart/form-data' id="logoFormData">
                    @csrf
                    <div class="file-field">
                        <div class="inp-fil btn-primary btn-sm float-left" id="">
                            <span class="icon-size"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                            <input type="file" id="file"  name="logo" onchange="this.form.submit();">
                            <input type="hidden" name="_orderId" value="{{ request()->route('id') }}">

                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload Logo" name="logo" id="file">
                        </div>

                    </div>                  
                </form>
                
                
               <form class="md-form pt-4" action="{{ route('save.music') }}" method="POST" enctype ='multipart/form-data' id="uploadMusicFormSubmit">
                    @csrf                    
                    <div class="file-field">
                        <div class="inp-fil btn-primary btn-sm float-left" id="uploadMusic">
                            <span class="icon-size"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                            <input type="file" onchange="this.form.submit();" name="music" accept="audio/mp3,audio/*;capture=microphone" id="uploadedMusic" >
                             <input type="hidden" name="_orderIdForMusic" value="{{ request()->route('id') }}">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload Music">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-1 col-md-1 mb-md-0 mb-4 title"></div>
        </div>
    </div>
</section>

<section>
    <div class="container m-50" id="secondSectionContent">
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 mb-4 title">
                <h3 class="text-center"><b>SELECT THUMBNAIL STYLE</b></h3>
                <hr>
                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-12 d-flex justify-content-center mb-5">

                        <button type="button" class="btn btns btn-outline-black waves-effect filter" data-rel="all">All</button>
                        <button type="button" class="btn btns btn-outline-black waves-effect filter" data-rel="1">Mountains</button>
                        <button type="button" class="btn btns btn-outline-black waves-effect filter" data-rel="2">Sea</button>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <!-- Grid row -->
                <div class="gallery" id="gallery">

                    <!-- Grid column -->
                    <div class="mb-3 pics animation all 1">
                        <a href="https://www.youtube.com/embed/A3PDXmYoF5U" target="_blank">
                            <img class="img-fluid" src="{{URL::asset('public/img/slide1.jpg')}}" alt="Card image cap">
                        </a>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="mb-3 pics animation all 1">
                        <a href="https://www.youtube.com/embed/A3PDXmYoF5U" target="_blank">
                            <img class="img-fluid" src="{{URL::asset('public/img/slide2.jpg')}}" alt="Card image cap">
                        </a>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="mb-3 pics animation all 1">
                        <a href="https://www.youtube.com/embed/A3PDXmYoF5U" target="_blank">
                            <img class="img-fluid" src="{{URL::asset('public/img/slide3.jpg')}}" alt="Card image cap">
                        </a>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="mb-3 pics animation all 2">
                        <a href="https://www.youtube.com/embed/A3PDXmYoF5U" target="_blank">
                            <img class="img-fluid" src="{{URL::asset('public/img/slide4.jpg')}}" alt="Card image cap">
                        </a>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="mb-3 pics animation all 2">
                        <a href="https://www.youtube.com/embed/A3PDXmYoF5U" target="_blank">
                            <img class="img-fluid" src="{{URL::asset('public/img/slide5.jpg')}}" alt="Card image cap">
                        </a>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="mb-3 pics animation all 2">
                        <a href="https://www.youtube.com/embed/A3PDXmYoF5U" target="_blank">
                            <img class="img-fluid" src="{{URL::asset('public/img/slide6.jpg')}}" alt="Card image cap">
                        </a>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->
            </div>
        </div>
    </div>
    </section>

<section>
    <div class="container m-50 mb-4 create-pro text-center">
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <a href="javascript:void(0);">
                    <button  class="btn waves-effectss btn-blue waves-effect waves-light" id="backToCreateVideoPage">BACK</button>
                </a>
                <a href="javascript:void(0);">
                    <button  class="btn waves-effectss btn-blue waves-effect waves-light saveForm2Data" type="submit" name="submit">NEXT</button>
                </a>
            </div>
        </div>
    </div> 
</section>

<section class="hero-bg-section2 mt-0">
  <img class="hero-bg-bottom" src="{{asset('public/img/right-blue_morph.svg')}}" alt="blue icon" aria-hidden="true">
</section>
</div>
@endsection

@extends('layouts.partials.home')
@section('content')
 <link href="{{asset('public/css/homepage2.css')}}" rel="stylesheet">
 <link href="{{asset('public/css/style2.css')}}" rel="stylesheet">
<div id="main-content" class="">
<section class="banner">
<div class="banner__carousel">
<div class="banner__item" style="background-image:url(public/img/banner-01.jpg)"></div>
<div class="banner__item" style="background-image:url(public/img/banner-02.jpg)"></div>
<div class="banner__item" style="background-image:url(public/img/banner-03.jpg)"></div>
</div>
<div class="banner__videos">
<div class="banner__video">

<div class="wistia_responsive_padding" style="padding:56.22% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_p1dlqo7t89 videoFoam=true muted=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="public/img/swatch.jpg" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
</div>
<div class="banner__video" style="display: none;">

<div class="wistia_responsive_padding" style="padding:56.22% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_oq2ltxtcus videoFoam=true muted=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="public/img/swatch1.jpg" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
</div>
<div class="banner__video" style="display: none;">

<div class="wistia_responsive_padding" style="padding:56.22% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_wm6zp678ts videoFoam=true muted=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="public/img/swatch_1.jpg" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
</div>
</div>
<div class="banner__text absolute">
<h1 class="title">Make better videos<br> for your brand with OFFEO.</h1>
<a href="{{url('/get-started')}}" class="btn btn--pri-blue desktop-only">Get started for free</a>
<p style="display:none;">Free to use. No credit card required.</p>
</div>
</section>
<div class="logos">
<div class="container">
<h2 class="title">Built by a team trusted by</h2>
<div class="logos__list">
<div class="logos__item">
<img src="public/img/facebook-black.png">
</div>
<div class="logos__item">
<img src="public/img/instagram-black.png">
</div>
<div class="logos__item">
<img src="public/img/google-black.png">
</div>
<div class="logos__item">
<img src="public/img/natgeo-black.png">
</div>
<div class="logos__item">
<img src="public/img/samsung-black.png">
</div>
<div class="logos__item">
<img src="public/img/heineken-black.png">
</div>
</div>
</div>
</div>
<div class="reviews-big-wrap bg-grey"> 
    <h2 class="rf-sec-heading bluetext text-center">Members Feedback</h2>
    <div class="line skyBlue text-center slidetitles"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1">
          <a class="btn-floating waves-effect waves-light smll" href="#carousel-example-multi" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
        </div>
        <div class="col-md-10">
          <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
            <!--Controls-->
            <div class="controls-top">
              <a class="btn-floating left" href="#carousel-example-multi" data-slide="prev"><i
                  class="fas fa-chevron-left"></i></a>
              <a class="btn-floating right" href="#carousel-example-multi" data-slide="next"><i
                  class="fas fa-chevron-right"></i></a>
            </div>
            <!--/.Controls-->

            <!-- Indicators -->
           
            <!--/.Indicators-->

            <div class="carousel-inner v-2" role="listbox">

              <div class="carousel-item active">
                <div class="col-12 col-md-4">
                  <div class="card mb-2">
                    <a href=""><img class="card-img-top" src="public/img/1.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-12 col-md-4">
                  <div class="card mb-2">
                    <a href=""><img class="card-img-top" src="public/img/2.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-12 col-md-4">
                  <div class="card mb-2">
                    <a href=""><img class="card-img-top" src="public/img/3.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-12 col-md-4">
                  <div class="card mb-2">
                    <a href=""><img class="card-img-top" src="public/img/1.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-12 col-md-4">
                  <div class="card mb-2">
                    <a href=""><img class="card-img-top" src="public/img/5.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col-12 col-md-4">
                  <div class="card mb-2">
                    <a href=""><img class="card-img-top" src="public/img/6.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
                <div class="carousel-item">
                <div class="col-12 col-md-4">
                  <div class="card mb-2">
                    <a href=""><img class="card-img-top" src="public/img/7.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
                <div class="carousel-item">
                <div class="col-12 col-md-4">
                  <div class="card mb-2">
                    <a href=""><img class="card-img-top" src="public/img/8.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-1">
          <a class="btn-floating waves-effect waves-light smll small2" href="#carousel-example-multi" data-slide="next"><i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div> 
    <button class="view"><a href="get-started.html" class="btn btn--pri-blue" influence_scanned="true">View more templates</a></button>
  </div>
  

<div class="landing-format">
<h3 class="subtitle">Multiple Video Dimensions</h3>
<h2 class="title">Any Aspect Ratio</h2>
<p>Maximise your video performance by creating your videos in the perfect size for your social media platforms</p>
<img src="public/img/Aspect-Ratio.jpg" class="landing-format__image">
</div>
<div class="examples">
<div class="row bg-grey">
<div class="container">
<div class="examples__item" style="padding-top: 100px;">
<div class="examples__content">
<h2 class="title">Welcome To Dropshipmedia</h2>
<p style="padding-top: 10px;">Editing Video is a cloud-based video maker for creating intro videos for YouTube, explainer animations, kinetic typography, product or service promotional videos, music visualizations, wedding or travel slideshows, mobile app promotions, event invitations, corporate presentations, infographics, and a lot more.</p>
  <button class="try"><a href="get-started.html" class="btn btn--pri-blue" influence_scanned="true">Try for Free</a></button>   
</div>
<div class="examples__video examples__video--short">
<img src="public/img/Design.jpg" class="image">
</div>
</div>
</div>
</div>
<div class="row">
<div class="container">
<div class="examples__item is-reversed customize">
<div class="examples__content">
<h2 class="title">Full Creative Control</h2>
<h3 class="subtitle">Customise your videos to suit your brand</h3>
<p>Stand apart from your competitors and make it memorable for your customers.</p>
</div>
<div class="examples__video">
<img src="public/img/Customize.jpg" class="image">
</div>
</div>
</div>
</div>
<div class="row bg-grey">
<div class="container">
<div class="examples__item">
<div class="examples__content">
<h2 class="title">Animate Instantly</h2>
<h3 class="subtitle">Add movement to your designs in one click</h3>
<p>Make your design come alive and attract the attention your product deserves.</p>
</div>
<div class="examples__video examples__video--short">
<img src="public/img/Animate.jpg" class="image">
</div>
</div>
</div>
</div>
<div class="row">
<div class="container">
<div class="examples__item is-reversed">
<div class="examples__content">
<h2 class="title">Live Preview</h2>
<h3 class="subtitle">Make changes on the fly</h3>
<p>No long waiting time to check on your design and animation.</p>
</div>
<div class="examples__video">
<img src="public/img/Live-Preview.jpg" class="image">
</div>
</div>
</div>
</div>
<div class="row bg-grey">
<div class="container">
<div class="examples__item">
<div class="examples__content">
<h2 class="title">Premium Music</h2>
<h3 class="subtitle">Complete your video with the right beats</h3>
<p>Thousands of royalty-free cinema quality music for any occasion, composed by the most talented musicians around the world.</p>
</div>
<div class="examples__video examples__video--short">
<img src="public/img/Sound.jpg" class="image">
</div>
</div>
</div>
</div>
</div>
<div class="photos-videos">
<h3 class="subtitle">Photo & Video</h3>
<h2 class="title">Access to millions of high-resolution<br />royalty-free stock photos and videos</h2>
<p>Choose the perfect media for your design.</p>
<img src="public/img/Stock-Photo.jpg" class="image" style="width: 100%;">
</div>

<section class="testimonial text-center">
        <div class="container">

            <div class="heading black-heading">
                What others are saying
            </div>
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <img src="public/img/fair_trade_connection_ronny.png" class="img-circle img-responsive" />
                            <p>OFFEO is just what I was waiting for! I am a video producer and visual marketer that creates videos for social media on a regular basis. OFFEO helps me create these ads with high-quality animations in a heartbeat. </p>
                           <p class="author">
<span class="name">Ronny</span><br>
<span class="role">Founder / CEO, <a href="#" target="_blank" tabindex="0" influence_scanned="true">Fair Trade Connection</a></span>
</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="public/img/screen_pilot_arielle.jpeg" class="img-circle img-responsive" /><p>OFFEO helps me create professional, animated social media posts in minutes. I love using the tool for Instagram stories especially, and we've had positive feedback from our clients about how cool they look. </p>
                          <p class="author">
<span class="name">Arielle Rubenstein</span><br>
<span class="role">Social Media Specialist, <a href="#" target="_blank" tabindex="0" influence_scanned="true">Screen Pilot</a></span>
</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="public/img/margalith_inc_ayndsay.jpg" class="img-circle img-responsive" />
                            <p>OFFEO has been a great tool in making engaging short promotional content for my company's Facebook Page. I noticed that clients and friends are more prone to click on my business's post when they are animated and have music. </p>
                            <p class="author">
<span class="name">Lyndsay Roman</span><br>
<span class="role">Founder &amp; President, <a href="#" target="_blank" tabindex="0" influence_scanned="true">Margalith Inc</a></span>
</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>


<div class="offers">
<span class="circle circle-1"></span>
<span class="circle circle-2"></span>
<div class="container">
<h2 class="title process">THE PROCESS</h2>
<p>Get started quickly with thousands of templates to choose from, designed for social media platforms like Facebook, Instagram, Youtube, Twitter, Linkedin etc.</p>
<a href="#" class="btn btn--pri-blue">Create now - it's free</a>
</div>
</div>
<div id="yt-player" style="display: none;"></div>
</div>
    

  
@endsection
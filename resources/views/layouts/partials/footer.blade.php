<footer id="main-footer" class="">
<div class="row">

<div class="col-md-3 one-fourths clear-both">
<a href="/" target="_blank">
    <img src="{{asset('public/img/footer-logo.png')}}" alt="logo">
</a>
<div class="footer__social">
<a target="_blank" href="#" class="footer-social">
<i class="fa fa-facebook-square" aria-hidden="true"></i>
</a>
<a target="_blank" href="#" class="footer-social">
<i class="fa fa-instagram"></i>
</a>
<a target="_blank" href="#" class="footer-social">
<i class="fa fa-pinterest"></i>
</a>
<a target="_blank" href="#" class="footer-social">
<i class="fa fa-youtube"></i>
</a>
<a target="_blank" href="#" class="footer-social">
<i class="fa fa-twitter"></i>
</a>
</div>
</div>
<div class="col-md-3 one-fourths clear-both">
<a target="_blank" class="external-link" href="#"><h4>Tools</h4></a>
<br />
<a target="_blank" class="external-link" href="#"><h4>Learn</h4></a>
<br />
<a target="_blank" href="#"><h4>FAQ</h4></a>
</div>
<div class="col-md-3 one-fourths clear-both">
<h4 style="margin-left: 35px;">Uses For OFFEO</h4>
<ul class="links">
<li><a class="external-link" href="#" target="_blank">Real Estate</a></li>
</ul>
<ul class="links">
    <li><a class="external-link" href="#" target="_blank">Ad Maker</a></li>
    <li><a class="external-link" href="#" target="_blank">Animation Maker</a></li>
    <li><a class="external-link" href="#" target="_blank">Black Friday Giveaway</a></li>
    <li><a class="external-link" href="#" target="_blank">Commercial Maker</a></li>
    <li><a class="external-link" href="#" target="_blank">Gallery</a></li>
    <li><a class="external-link" href="#" target="_blank">Halloween Templates</a></li>
    <li><a class="external-link" href="#" target="_blank">Intro Maker</a></li>
    </ul>
</div>
<div class="col-md-3 one-fourths clear-both">
<h4 style="margin-left: 35px;" class="support">Support</h4>
<ul class="links">
<li><a target="_blank" href="#">Contact Us</a></li>
<li><a target="_blank" href="#">Privacy Policy</a></li>
<li><a target="_blank" href="#">Terms of Use</a></li>
</ul>
</div>
</div>

</footer>

</div>
        <script src="{{asset('public/js/jquery-3.4.0.min.js')}}"></script>
        <script src="{{asset('public/js/bodymovin.js')}}"></script>
       <script src="{{asset('public/js/ofi.min.js')}}"></script>
       <script src="{{asset('public/js/plyr.js')}}"></script>
       <script src="{{asset('public/js/jquery.nice-select.min.js')}}"></script>
       <script src="{{asset('public/js/selectize.js')}}"></script>
       <script src="{{asset('public/js/masonry.pkgd.min.js')}}"></script>
       <script src="{{asset('public/js/imagesloaded.pkgd.min.js')}}"></script>
       <script src="{{asset('public/js/variables.js')}}"></script>
       <script src="{{asset('public/js/main.js')}}"></script>
      <script src="{{asset('public/js/slick.js')}}"></script>
      <script src="{{asset('public/js/script.js')}}"></script>
      <script src="{{asset('public/js/ajax.js')}}"></script>
     <script type="text/javascript" src="{{asset('public/js/popper.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('public/js/mdb.min.js')}}"></script>
      <!--   <script type="text/javascript" src="{{asset('public/js/bootstrap.min.js')}}"></script>-->
       <script src="{{asset('public/js/E-v1.js')}}" async></script>
    
       <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
          <script type="text/javascript" src="{{asset('public/js/bootstrap.min.js')}}"></script>
   <script type="text/javascript">
    $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
      var next = $(this).next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));

      for (var i=0;i<4;i++) {
        next=next.next();
        if (!next.length) {
          next=$(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
      }
    });
  </script>
       
<script type="text/javascript"> 
$(document).ready(function(){
  $(".navbar-toggler").click(function(){
    $("#basicExampleNav").slideToggle("slow");
  });
});
</script>


@section('content_page1')


<section><!--Aboutus  MIKkAfmY4KE-->
<div class="inner_wrapper">

    <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
        <div class=" delay-01s animated fadeInDown wow animated">
            <div class="panel-body">

                <a href="{{ $page->link }}" class="contact_btn"> !Go</a>
            </div>
        </div>
    </div>
  <div class="container">
   <div class="flex-center position-ref full-height">



       
            @if (Route::has('login'))
                <div class="top-right links">
                    <ul class="social_links">
                    @auth
                        
                        

                        <li class="pinterest animated bounceIn wow delay-01s"><a href="{{ url('/admin') }} "><i class="fa fa-sign-in " style="color:green"></i></a></li>
                        
                        <li class="pinterest animated bounceIn wow delay-02s">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out " style="color:red"></i>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                  
                    @if(isset($socialAlls) && is_object($socialAlls))
                    @foreach($page->socialAlls as $socialAll)             
                                    
                        <li class="gplus animated bounceIn wow delay-02s" target="_blank"><a href="{{ $socialAll->link }}" target="_blank"><i class="fa {{$socialAll->callBack}}"></i></a></li>

                        
                    @endforeach
                    @endif

                    @else
                        
                       
                        <li class="pinterest animated bounceIn wow delay-01s"><a href=" {{ route('login') }} "><i class="fa fa-sign-in " style="color:green"></i></a></li>
                        <li class="twitter animated bounceIn wow delay-02s"><a href="{{ route('register') }} "><!--i class="far fa-registerd" ></i--></a></li>

                    @if(isset($socialAlls) && is_object($socialAlls))
                    @foreach($page->socialAlls as $socialAll)                         
                    

                        <li class="gplus animated bounceIn wow delay-02s" target="_blank"><a href="{{ $socialAll->link }}" target="_blank"><i class="fa {{$socialAll->callBack}}"></i></a></li>
                        
                   @endforeach
                    @endif
                    </ul>
                    
                    @endauth
                </div>

            @endif
</div>
   </div> 
</div>
</section>

    <div class=" delay-01s animated fadeInDown wow animated">
        <a href="{{ url ('/') }}">{!! Html::image('assets/img/'.$page->images,'',['class' => 'zoomIn wow animated', 'class' => 'center-block' ]) !!}</a>
    </div>
<div id="thumb-wrap" style="position: fixed; z-index: -99; width: 100%; height: 80%">

        <iframe allowfullscreen frameborder="0" height="100%&quot;" src="https://www.youtube.com/embed/{{ $page->videos }}?enablejsapi=1;%20autoplay=1%20&version=3&loop=1&playlist={{ $page->videos }}&origin=&rel=1&start=3" width="100%"></iframe>

</div>
<embed height="0" width="0"
       src="http://youtube.googleapis.com/v/{{ $page->audios }}&autoplay=1&loop=1" />
<style>
    #thumb-wrap {
        position: relative;

        overflow: hidden;
    }
    #thumb-wrap iframe {
        position: absolute;
        margin: auto;
        top: 60px;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

</div>


<!--Footer-->
<footer class="footer_wrapper" id="contact">
  
  <div class="container">
   

    <div class="footer_bottom"><span>{{ $page->name }} </span> </div>


  </div>
</footer>
<script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{
 asset('assets/js/jquery-scrolltofixed.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.nav.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.isotope.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/wow.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
@endsection





        
          
        


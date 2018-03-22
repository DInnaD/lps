@section('content_portfolio')



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
                        
                       
                        <li class="pinterest animated bounceIn wow delay-01s"><a href=" {{ route('login') }} "><i class="fa fa-sign-in " style="color:gray"></i></a></li>
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
<div class=" delay-01s animated fadeInDown wow animated">

 <a href="{{ url ('/') }}">{!! Html::image('assets/img/'.$page->images,'',['class' => 'zoomIn wow animated']) !!}</a>
 </div>

 </div>   
<!-- Portfolio -->
<section id="Portfolio" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
   
    <h2>{{ $page->name }}</h2>
    
    </div>

    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
  <div class="portfolio-top"></div>
  
  <!-- Portfolio Filters tags  -->
  <div class="portfolio"> 
  
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>All</h5>
          </a></li>
          @foreach($tagMores as $tagMore)

          <li><a class="" href="" data-filter=".{{ $tagMore }}">
          <h5>{{ $tagMore }}</h5>
          </a></li>
          @endforeach
          
        
        
      </ul>
    </div>
    <!--/Portfolio Filters --> 
 
    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper"> 
       @foreach($page->portfolioAlls as $item) 
            <!-- Portfolio Item -->
      <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{ $item->filter }} isotope-item">
        <div class="portfolio_img"> 
        {!! Html::image('assets/img/'.$item->images,$item->name) !!}
        </div>        
        <div class="item_overlay">
          <div class="item_info">
             
            <a class="" href="{{ $item->link }}" target="_blank"><i class="fa fa-shopping-cart" style = "font-size: 90px; padding-bottom: 0px; "></i></a>
            <h4 class="project_name" style = "padding-top: 0px;">{{ $item->name }}</h4>


          </div>
        </div>
        </div>
  
      @endforeach 

      <!--/Portfolio Item  -->
      
    </div>
    <!--/Portfolio Wrapper --> 
    
  </div>
  <!--/Portfolio Filters -->
  
  <div class="portfolio_btm"></div>
  
  
  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>

   
  </div>
 
  
</section>
<!--client_logos-->
@if(isset($peopleAlls) && is_object($peopleAlls))
<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    
   
    <div class="team_section clearfix">
    @foreach($peopleAlls as $peopleAll)
    
      
      <div class="team_area">
        <div class="team_box wow fadeInDown delay-0{{ ($peopleAll->id*3 + 3) }}s">
        
          <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
          {!! Html::image('assets/img/'.$peopleAll->images,$peopleAll->name) !!}
            <ul>

                        <li class="twitter animated bounceIn wow delay-02s"><a href="" target="_blank"><i class="fa fa-heart"></i>TEAM<i class="fa fa-heart"></i></a></li>

            </ul>
        </div>
        <h3 class="wow fadeInDown delay-0{{ ($peopleAll->id*3 + 3) }}s">{{$peopleAll->name}}</h3>
        <span class="wow fadeInDown delay-0{{ ($peopleAll->id*3 + 3) }}s">{{$peopleAll->position}}</span>
        <p class="wow fadeInDown delay-0{{ ($peopleAll->id*3 + 3) }}s">{{$peopleAll->text}}</p>
      </div>

  @endforeach
@endif 

    </div>      
  </div>
</section>
<!--Footer-->
<footer class="footer_wrapper" id="contact">


    <div class="footer_bottom"><span>&copy; 2018 <a href="#">LandingPages</a>,  Designed with <i
                            class="fa fa-heart"></i> by <a href="https://www.facebook.com/ITvolunteerInnaDanylevska">ITvolunteersFIRST</a>. </span> </div>


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





        
          
        


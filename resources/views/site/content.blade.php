


          
        

<!--Service-->

@if(isset($portfolios) && is_object($portfolios))
       
 @if(isset($pages) && is_object($pages))      
<!-- Portfolio -->
<section id="Portfolio" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
    <h2>{{ link_to_route('portfolios.index', 'LandingPages') }}</h2>
    </div>

    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
  <div class="portfolio-top"></div>
  
  <!-- Portfolio Filters tags  -->
  <div class="portfolio"> 
   @if(isset($tags))
       
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>All</h5>
          </a></li>
          @foreach($tags as $tag)

          <li><a class="" href="" data-filter=".{{ $tag }}">
          <h5>{{ $tag }}</h5>
          </a></li>
          @endforeach
          
        
        
      </ul>
    </div>
    <!--/Portfolio Filters --> 
  @endif  
    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper"> 
       @foreach($portfolios as $item) 
            <!-- Portfolio Item -->
      <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{ $item->filter }} isotope-item">
        <div class="portfolio_img"> 
        {!! Html::image('assets/img/'.$item->images,$item->name) !!}
        </div>        
        <div class="item_overlay">
          <div class="item_info">
            <a class="" href="{{ route('topic', compact('item')) }}" target="_blank"><i class="fa fa-info-circle" style = "font-size: 120px; padding-bottom: 0px;"></i></a> 
            <a class="" href="{{ $item->link }}" target="_blank"><i class="fa fa-facebook" style = "font-size: 40px; padding-bottom: 0px; "></i></a>
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
@endif 
@endif 
<!--/Portfolio --> 
<!--Service-->
<section  id="service">
  <div class="container">
    <h2>INSTRUCTION</h2>
    <div class="service_wrapper">
    
      @if(isset($services) && is_object($services))
      
    @foreach($services as $service)    

        @if($service->id == 0 || $service->id%3 == 0)
      <div class="row" {{ ($service->id != 0) ? 'borderTop' : '' }}>
      
        @endif

        <div class="col-lg-4" {{ ($service->id%3 > 0) ? 'borderLeft' : '' }} {{ ($service->id > 2) ? 'mrgTop' : '' }}>
          <div class="service_block">
            <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa {{ $service->icon }}"></i></span> </div>
            <h3 class="animated fadeInUp wow">{{ $service->name }}</h3>
            <p class="animated fadeInDown wow">{{ $service->text }}</p>
          </div>
        </div>


        @if(($service->id + 1)%3 == 0)
          </div>
        @endif
     @endforeach   
    </div>
  </div>
</section>

 @endif
        
          
        

<!--Service-->
<!--client_logos-->
@if(isset($peoples) && is_object($peoples))
<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    <h2>{{ link_to_route('peoples.index', 'TEAM') }}</h2>
    
    <div class="team_section clearfix">
    @foreach($peoples as $people)
    
      
      <div class="team_area">
        <div class="team_box wow fadeInDown delay-0{{ ($people->id*3 + 3) }}s">
        
          <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
          {!! Html::image('assets/img/'.$people->images,$people->name) !!}
          <ul>
          @if(isset($socialPeoples) && is_object($socialPeoples))
             @foreach($people->socialPeoples as $socialPeople)
            <li class="twitter animated bounceIn wow delay-02s"><a href="{{ $socialPeople->link }}" target="_blank"><i class="fa {{$socialPeople->callBack}}"></i></a></li>
            @endforeach
          @endif  
          </ul>
        </div>
        <h3 class="wow fadeInDown delay-0{{ ($people->id*3 + 3) }}s">{{$people->name}}</h3>
        <span class="wow fadeInDown delay-0{{ ($people->id*3 + 3) }}s">{{$people->position}}</span>
        <p class="wow fadeInDown delay-0{{ ($people->id*3 + 3) }}s">{{$people->text}}</p>
      </div>

  @endforeach
@endif

      
      
    </div>
  </div>
</section>
<!--/Team-->
<!--Footer-->
<footer class="footer_wrapper" id="contact">
  
  <div class="container">
    <div class="footer_bottom"><span>&copy; 2018 <a href="#">LandingPages</a>,  Designed with <i
                            class="fa fa-heart"></i> by <a href="https://www.facebook.com/ITvolunteerInnaDanylevska">ITvolunteersFIRST</a>. </span> </div>
  </div>
</footer>

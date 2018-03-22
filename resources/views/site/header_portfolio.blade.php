

<div class="header_box" style="
    height: 100px;
">
<div class=" delay-01s animated fadeInDown wow animated">

  <div class="flex-center position-ref full-height">



       
            @if (Route::has('login'))
                <div class="top-right links">
                    <ul class="social_links">
                    @auth
                        
                        

                        <li class="pinterest animated bounceIn wow delay-01s"><a href="{{ url('/admin') }} "><!--i class="fa fa-sign-in " style="color:green"--></i></a></li>
                        
                        <li class="pinterest animated bounceIn wow delay-02s">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <!--i class="fa fa-sign-out " style="color:red"></i-->
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
                        
                       
                        <li class="pinterest animated bounceIn wow delay-01s"><a href=" {{ route('login') }} "><!--i class="fa fa-sign-in " style="color:green"></i--></a></li>
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
     




     

@section('content_page1')
<section>
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
    </div>
    </div>
    </section>


<section><!--Aboutus-->
<div class="inner_wrapper">

    <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
        <div class=" delay-01s animated fadeInDown wow animated">
            <div class="panel-body">

                <a href="{{ $page->link }}" class="contact_btn"> !Go<i class="fa fa-shopping-cart" style = "font-size: 20px; padding-bottom: 0px; ">{{ $page->audios }}</i></a>
            </div>
        </div>
    </div>
    <!--Footer-->

    <footer class="footer_wrapper" >

        <div class="container">


            <div class="footer_bottom" style="color:white;">{!! $page->text !!} </div>


        </div>
    </footer>



<section><!--Aboutus-->
    <div class="inner_wrapper">
        <div class="container">
            <h2>{{ $page->name }}</h2>
            <hr>
            <div class="inner_section">
                <div class="row">
                    <div class=" col-lg-5 col-md-5 col-sm-5 col-xs-12 pull-right">
                        <div class="panel-body">
                            <a class="btn btn-info btn-xs col-md-2 col-sm-2 col-xs-2" href="{{ $page->link }}">
                                Vote
                            </a>
                        </div>
                        <div class=" delay-01s animated fadeInDown wow animated">

                            <ul>
                                <li>
                                    <a href="{{ $page->link }}">{!! Html::image('assets/img/'.$page->images,'',['class' => 'zoomIn wow animated']) !!}</a>
                                </li>


                            </ul>

                        </div>
                    </div>

                    <div class=" col-lg-5 col-md-5 col-sm-5 col-xs-12 pull-left">
                        <div class="panel-body">
                            <a class="btn btn-info btn-xs col-md-2 col-sm-2 col-xs-2" href="{{ $page->link }}">
                                 Vote
                            </a>
                        </div>
                        <div class=" delay-01s animated fadeInDown wow animated">
                            <ul>


                                <li>
                                    <a href="{{ $page->link }}">{!! Html::image('assets/video/'.$page->videos,'',['class' => 'zoomIn wow animated']) !!}</a>
                                </li>

                            </ul>

                            </div>


                        </div>

                    </div>

                </div>

            </div>
        </div>

</section>



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





        
          
        


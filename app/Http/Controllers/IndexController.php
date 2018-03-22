<?php

namespace App\Http\Controllers;

//use App\Index;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\People;
use App\SocialPeople;
use App\Portfolio;
use App\Service;
use App\Page;
use App\Index;
use App\Logo;
use App\Socialy;
use App\PeopleAll;
use App\PortfolioAll;
//use App\SocialPeopleAll;
use App\SocialAll;

use Mail;
use DB;
use Validator;
use File;
use Storage;
use Illuminate\Http\UploadedFile;
//use App\Mail\Welcome;//php artisan make:mail Welcome --markdown=emails.welcome

//use App\Http\Requests\IndexRequest;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
           
        $pages = Page::all();
        //$pages = $portfolio->pages;
        $portfolios = Portfolio::all();//get(array('id', 'name', 'filter', 'images', 'link' ));
        //$services = Service::where('id','<',20)->get();
        $peoples = People::all();//take(3)->get();

        
        $tags = DB::table('portfolios')->distinct()->pluck('filter');
     //dd($socials);
        $socials = Socialy::take(24)->get();

        //dd($socials);
        $socialPeoples = SocialPeople::all();//take(5)->get();
        

        
        $portfolioAlls = PortfolioAll::all();
        $services = Service::where('id','<',20)->get();
        $peopleAlls = PeopleAll::all();
        $tagMores = DB::table('portfolio_alls')->distinct()->pluck('filter');
        $socialAlls = SocialAll::take(24)->get();
        //$socialPeopleAlls = SocialPeopleAll::all();
        $logos = Logo::take(1)->get();
        
        return view('site.index', array(
            //'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags'=> $tags,
            'socials' => $socials,
            'socialPeoples' => $socialPeoples,
            'logos'=> $logos,
            'services' => $services,
            'portfolioAlls' => $portfolioAlls,
            'peopleAlls' => $peopleAlls,
            'tagMores'=> $tagMores,
            'socialAlls' => $socialAlls,
            //'socialPeopleAlls' => $socialPeopleAlls,
        ));// ne k maketu ('layouts.site'); a k promegutochnomu
    }
}

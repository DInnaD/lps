<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\People;
use App\PeopleAll;
use App\Portfolio;
use App\PortfolioAll;
use App\Portfolio1;
use App\Service;
use App\SocialPeople;
//use App\SocialPeopleAll;
use App\Logo;
use App\Socialy;
use App\SocialAll;



use DB;
use App\Http\Requests;

class PageController extends Controller
{
    //
    public function execute($alias){
    	if(!$alias){
    		abort(404);
    	}
    	if(view()->exists('site.page1')){
    		$page = Page::where('alias',strip_tags($alias))->first();

    	$pages = Page::all();                   
        $portfolios = Portfolio::all();
        $portfolioAlls = PortfolioAll::all();
        $services = Service::where('id','<',20)->get();
        $peopleAlls = PeopleAll::all();
        $tagMores = DB::table('portfolio_alls')->distinct()->pluck('filter');
        $socialAlls = SocialAll::take(24)->get();
        $logos = Logo::take(1)->get();
        
    		$data = [
    			'title' => $page->name,
    			'page' => $page,
                'services' => $services,
            'portfolioAlls' => $portfolioAlls,
            'portfolios' => $portfolios,
            'peopleAlls' => $peopleAlls,
            'tagMores'=> $tagMores,
            'socialAlls' => $socialAlls,
            //'socialPeopleAlls' => $socialPeopleAlls,
            'pages' => $pages,
            'logos'=> $logos,

    		];
    		return  view('site.page1', $data);
    	}else{
    		abort(404);
    	
    	}

    }

     public function executePortfolio($alias){
        if(!$alias){
            abort(404);
        }
        if(view()->exists('site.portfolio')){
            $page = Page::where('alias',strip_tags($alias))->first();
        $pages = Page::all();                   
        $portfolios = Portfolio::all();
        $portfolioAlls = PortfolioAll::all();
        $services = Service::where('id','<',20)->get();
        $peopleAlls = PeopleAll::all();
        $tagMores = DB::table('portfolio_alls')->distinct()->pluck('filter');
        $socialAlls = SocialAll::take(24)->get();
        $logos = Logo::take(1)->get();
            $data = [
                'title' => $page->name,
                'page' => $page,
                'services' => $services,
            'portfolioAlls' => $portfolioAlls,
            'portfolios' => $portfolios,
            'peopleAlls' => $peopleAlls,
            'tagMores'=> $tagMores,
            'socialAlls' => $socialAlls,
            //'socialPeopleAlls' => $socialPeopleAlls,
            'pages' => $pages,
            'logos'=> $logos,

            ];
            return  view('site.portfolio', $data);
        }else{
            abort(404);
        
        }

    }
}

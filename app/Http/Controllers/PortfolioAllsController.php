<?php

namespace App\Http\Controllers;


use App\PortfolioAll;
use App\Portfolio;
use App\Page;
use Mail;
use DB;
use Validator;
use File;
use Storage;
use Illuminate\Http\UploadedFile;
//use App\Http\Requests\PortfolioRequest;
//use App\Http\Requests\SubscriberhRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Auth;
use App\User;
use App\Owned;


class PortfolioAllsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PortfolioAll $portfolioAll, Portfolio $portfolio, Page $page)
    {
        //
        $portfolioAlls = $page->portfolioAlls;
        return view('admin.portfolioAlls.index', compact('portfolio','page'));
        
    } 
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PortfolioAll $portfolioAll, Portfolio $portfolio, Page $page)
    {
        //
        return view('admin.portfolioAlls.create', compact('portfolioAll', 'portfolio','page'));

    }
    /**
     * Store a newly created resource in storage.
     * @param  string $portfolio
     * @param  string $page
     * @param  string $portfolioAll
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, PortfolioAll $portfolioAll, Portfolio $portfolio, Page $page)
    {
        
        if($request->isMethod('post')){
//         dd($request);
        $input = $request->all();
        //dd($input);
        
          $messages = [
           
             'required' => 'Field :attribute required',
             'unique' => 'Field :attribute unique'
//              ,
//              'resolution' => 'Field :attribute 1366x768'
         ];
         
         $validator = Validator::make($input, [
            
             'name' => 'required|max:255',
             'filter' => 'required|max:255',
             'images' => 'required|unique:portfolio_alls'    
        
         ], $messages);
         if($validator->fails()){
             return redirect()->route('portfolios.create', compact('portfolioAll', 'portfolio', 'page'))->withErrors($validator)->withInput();

        }

        if($request->hasFile('images')){
        // new of obj uploadedFile
        $file = $request->file('images');
        //dd($file);
        //with obj 'images' already
        //dd($input);
        //but we need clean it dd($input); and put here filerealname
        $input['images'] = $file->getClientOriginalName();  //получение оригинального имени файла
//           
        //dd($input);//the same
        
        $file->move(public_path().'/assets/img', $input['images']);  //копирование файла на сервер
        }
    //dd($input);//the same
    }
            //dd($input); 

         $page->portfolioAlls()->create($input);
//dd($portfolio); 

         return redirect()->route('portfolioAlls.index', compact('portfolioAll', 'portfolio', 'page'))->with('status', 'PortfolioAll added');
     }

    /**
     * Display the specified resource.
     * TODO: $id -> $portfolioAll
     * @param  \App\PortfolioAll  $portfolioAll
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio, Page $page, PortfolioAll $portfolioAll)
    {
        //
        return view('admin.portfolioAlls.show', compact('portfolio', 'page', 'portfolioAll'));
    }

    

    /**
     * Remove the specified resource from storage.
     * @param  \App\Portfolio  $portfolio
     * @param  \App\Page $page
     * @param  \App\PortfolioAll  $portfolioAll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio, Page $page, PortfolioAll $portfolioAll)
    {
        //
        $portfolioAll->delete();

        return redirect()->route('peopleAlls.index', compact('portfolio', 'page'));
    }
}

<?php

namespace App\Http\Controllers;

use App\SocialAll;
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

class SocialAllsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SocialAll $socialAll, Portfolio $portfolio, Page $page)
    {
        //
        $socialAlls = $page->socialAlls;
        return view('admin.socialAlls.index', compact('portfolio','page'));
        
    } 
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SocialAll $socialAll, Portfolio $portfolio, Page $page)
    {
        //
        return view('admin.socialAlls.create', compact('socialAll', 'portfolio','page'));

    }
    /**
     * Store a newly created resource in storage.
     * @param  string $portfolio
     * @param  string $page
     * @param  string $socialAll
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, SocialAll $socialAll, Portfolio $portfolio, Page $page)
    {
        
        if($request->isMethod('post')){
//         dd($request);
        $input = $request->all();
        //dd($input);
        
          $messages = [
           
             'required' => 'Field :attribute required',
             'unique' => 'Field :attribute unique'
         ];
         
         $validator = Validator::make($input, [
            
             'name' => 'required|max:255',
             'link' => 'required|max:255',
             'callBack' => 'required|max:255'    
        
         ], $messages);
         if($validator->fails()){
             return redirect()->route('socialAlls.create', compact('socialAll','portfolio', 'page'))->withErrors($validator)->withInput();

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

         $page->socialAlls()->create($input);
//dd($portfolio); 

         return redirect()->route('socialAlls.index', compact('socialAll','portfolio', 'page'))->with('status', 'SocialAll added');
     }

    /**
     * Display the specified resource.
     * TODO: $id -> $socialAll
     * @param  \App\SocialAll  $socialAll
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio, Page $page, SocialAll $socialAll)
    {
        //
        return view('admin.socialAlls.show', compact('portfolio', 'page', 'socialAll'));
    }


    /**
     * Remove the specified resource from storage.
     * @param  \App\Portfolio  $portfolio
     * @param  \App\SocialAll  $socialAll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio, Page $page, SocialAll $socialAll)
    {
        //
        $socialAll->delete();

        return redirect()->route('socialAlls.index', compact('portfolio', 'page'));
    }
}

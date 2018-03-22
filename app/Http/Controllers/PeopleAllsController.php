<?php

namespace App\Http\Controllers;

use App\PeopleAll;
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

class PeopleAllsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PeopleAll $peopleAll, Portfolio $portfolio, Page $page)
    {
        //
        $peopleAlls = $page->peopleAlls;
        return view('admin.peopleAlls.index',  compact('portfolio','page'));//array('portfolio' => $portfolio, 'pages' => Page::orderBy('created_at', 'desc')->paginate(10)));
        
    } 
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PeopleAll $peopleAll, Portfolio $portfolio, Page $page)
    {
        //
        return view('admin.peopleAlls.create', compact('peopleAll', 'portfolio','page'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  string $portfolio
     * @param  string $page
     * @param  string $peopleAll
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, PeopleAll $peopleAll, Portfolio $portfolio, Page $page)
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
            'images' => 'required|unique:people_alls'    
        
         ], $messages);
         if($validator->fails()){
             return redirect()->route('peopleAlls.create', compact('portfolio', 'peopleAll'))->withErrors($validator)->withInput();

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

         $page->peopleAlls()->create($input);
//dd($portfolio); 

         return redirect()->route('peopleAlls.index', compact('peopleAll','portfolio', 'page'))->with('status', 'PeopleAll added');
     }

    /**
     * Display the specified resource.
     * TODO: $id -> $peopleAll
     * @param  \App\PeopleAll  $peopleAll
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio, Page $page, PeopleAll $peopleAll)
    {
        //
        return view('admin.peopleAlls.show', compact('portfolio', 'page', 'peopleAll'));
    }

   
    /**
     * Remove the specified resource from storage.
     * @param  \App\Portfolio  $portfolio
     * @param  \App\PeopleAll  $peopleAll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio, Page $page, PeopleAll $peopleAll)
    {
        //
        $peopleAll->delete();

        return redirect()->route('peopleAlls.index', compact('portfolio', 'page', 'peopleAll'));
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
class Portfolio extends Model
{
    //
    //use SoftDeletes;
    protected $table = 'portfolios';
    protected $fillable = ['id', 'name', 'filter', 'images', 'link'];
    public function pages(){
		 return $this->hasMany(Page::class, 'portfolio_id', 'id');//_bunch
	}//route

	// public function messages()
 //    {
 //        return $messages = [
           
 //             'required' => 'Field :attribute required',
 //             'unique' => 'Field :attribute unique'
 //         ];
 //    }﻿
}

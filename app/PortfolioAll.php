<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioAll extends Model
{
    
   // use SoftDeletes;
    protected $table = 'portfolio_alls';
    protected $fillable = ['id', 'name', 'filter', 'images', 'link', 'page_id'];
    public function pages(){//es i 
        return $this->belongsTo(Page::class, 'page_id','id');//_bunch
    }//r
}

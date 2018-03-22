<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAll extends Model
{
    use SoftDeletes;
    protected $table = 'social_alls';
    protected $fillable = ['name', 'link', 'callBack', 'page_id'];
    public function pages(){//es i 
        return $this->belongsTo(Page::class, 'page_id','id');//_bunch
    }//r
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeopleAll extends Model
{
    use SoftDeletes;
    protected $table = 'people_alls';
    protected $fillable = ['id', 'name', 'position', 'text', 'images', 'page_id'];
 //    public function socialPeopleAlls(){
	// 	 return $this->hasMany(SocialPeopleAll::class, 'peopleAll_id','id');//_bunch
	// }//route
	public function pages(){//es i 
        return $this->belongsTo(Page::class, 'page_id','id');//_bunch
    }//r
}

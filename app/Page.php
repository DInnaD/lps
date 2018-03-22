<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
	use SoftDeletes;
    //
    protected $table = 'pages1';
    //protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'alias', 'text', 'images',  'videos', 'audios', 'link', 'portfolio_id'];//  'videos'];//

    public function portfolios(){//es i 
        return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id');//_bunch
    }//r
    public function portfolioAlls(){
		 return $this->hasMany(PortfolioAll::class, 'page_id', 'id');//_bunch
	}//route
	public function peopleAlls(){
		 return $this->hasMany(PeopleAll::class, 'page_id', 'id');//_bunch
	}//route
	public function socialAlls(){
		 return $this->hasMany(SocialAll::class, 'page_id', 'id');//_bunch
	}//route
	public function remove()
	{
		$this->removeImage();
		$this->delete();
	}

	public function removeImage()
	{
		if($this->videos != null)
		{
			Storage::delete('assets/video/' . $this->videos);
		}
	}

	public function uploadImage($videos)
	{
		if($videos == null) { return; }

		$this->removeImage();
		$filename = getClientOriginalName();// . '.' . $videos->extension();
		$videos->storeAs('assets', $filename);
		$this->videos = $filename;
		$this->save();
	}

	public function getImage()
	{
		if($this->videos == null)
		{
			return '/video/no-image.png';
		}

		return '/assets/video/' . $this->videos;

	}

}

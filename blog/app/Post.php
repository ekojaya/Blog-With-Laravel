<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $table='posts';
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }
    public function comments(){
    	return $this->morphMany('App\Comment','commentable');
    }
    public function negara(){
    	return $this->belongsTo('App\Negara');
    }
    

}
 
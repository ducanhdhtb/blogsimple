<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
   protected $table="categories";
   public $timestamps=false;
    public function post()
    {
    	$user=User::all();
    	return $this->hasMany('App\Post','cate_id','id');
    }
}

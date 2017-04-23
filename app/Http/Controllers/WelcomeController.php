<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class WelcomeController extends Controller
{
    //Get

    public function getLienhe(){
    	return view('lienhe');
    }

    //Post
    public function postLienhe(){
    	$data=['hoten'=>'buituan'];
    	Mail::send('mail',$data,function($message){
    		//$message->from('ducanhdhtb@gmail.com','ducanh');
    		$message->to('hanganducanh@gmail.com','hnda')->subject('Ahihi');
    	})
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CateController extends Controller
{
    //List categories
    public function getlist(){
    	$cate=Category::all();
    	return view('admin.category.list',['cate'=>$cate]);

    }
    //Add a category--get
     public function getadd()
     {
    	return view('admin.category.add');

     }
     //Add a category-- post
     public function postadd(Request $request)
     {
    
    	$cate=new Category;
    	//Validate form
    	$this->validate($request,
    		['name'=>'required|unique:categories,cate_name'],
    		['name.required'=>'The field is not empty',
    		  'name.unique'=>'The field name is exist'
    		]);

    	$cate->cate_name=$request->name;
    	$cate->save();
    	return redirect('admin/category/add')->with('thongbao','Add successfully!');
    }
    //Update----
    public function getupdate($id)
    { 
    	$cate=Category::find($id);
    	return view('admin.category.update',['cate'=>$cate]);

    }

    //-----
    public function postupdate(Request $request,$id)
    	{
    	//Validate form....
    	$this->validate($request,
    		['name'=>'required|unique:categories,cate_name'],
    		['name.required'=>'The field is not empty',
    		  'name.unique'=>'The field name is exist'
    		]);
    	//End validate

    	$cate=Category::find($id);
    	$cate->cate_name=$request->name;
    	$cate->save();
    	return redirect('admin/category/update/'.$id)->with('thongbao','Update successfully!');
    	}
    	//Delete ....

    	public function getdelete($id){
    		$cate=Category::find($id);
    		$cate->delete();
    		return redirect('admin/category/list')->with('thongbao','Delete Complete!');

    	}
    
}

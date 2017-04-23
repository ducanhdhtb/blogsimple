<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //List posts
    public function getlist()
    {
    	$posta=Post::paginate(5);
    	return view('admin.post.list',['posta'=>$posta]);
    }
    //Delete post
    public function getdelete($id)
    {
    	$post=Post::find($id);
    	$post->delete();
    	return redirect('admin/post/list')->with('message','Delete complete');

    }
    //Add post
    public function getadd()
    {	
    	$user=User::all();
    	$cate=Category::all();
    	return view('admin.post.add',['cate'=>$cate,'user'=>$user]);
    }
    //--
    public function postadd(Request $request)
    {
    	$post=new Post;
    	if($request->hasFile('Hinh'))
                {
                  //Lấy cái hình ra,Lưu hình vào cái biens file này
                  $file=$request->file('Hinh');
             
                  //Láy cái tên hình ra để lưu lại
                  $name=$file->getClientOriginalName();
               //Chọn đường dẫn lưu hình
                  $file->move(public_path() . '/upload/postimage', $name);
             /*     $file->move('upload/avartar', $name);*/
                  $post->images=$name;
              }
          else
          {
            $post->images="";
          }
    	$post->title=$request->title;
    	$post->summary=$request->summary;
    	$post->content=$request->content;
    	$post->user_id=$request->user;
    	$post->cate_id=$request->cate;
    	$post->save();
    	return redirect('admin/post/add')->with('message','Add Post Successfully!');
    }
    //-----------------------------
    public function getupdate($id)
    {
    	//----Return view----
    	$user=User::all();
    	$post=Post::find($id);
    	$cate=Category::all();
    	return view('admin/post/update',['cate'=>$cate,'post'=>$post,'user'=>$user]);
    }
    //------
    public function postupdate(Request $request,$id)
    {
    	//Validate...
    	 $this->validate($request,
            [
              
              'content'=>'required',
              'summary'=>'required',
              
            ],
            [
            'content.required'=>'Content is not empty',
            'summary.required'=>'Summary is not empty',
        
            ]);
    	//----Process
    	$post=Post::find($id);
    	$post->title=$request->title;
    	$post->summary=$request->summary;
    	$post->content=$request->content;
    	//Spend for images
    	if($request->hasFile('img'))
                {
                  $file=$request->file('img');
                  $name=$file->getClientOriginalName();
                  $file->move(public_path() . '/upload/postimage', $name);
                  $post->images=$name;
              }
          else
          {
            $post->images="";
          }
          //End for image!
    	$post->user_id=$request->user;
    	$post->cate_id=$request->cate;
    	$post->save();
    	return redirect('admin/post/update/'.$id)->with('message','Update Successfully!');
    }
}

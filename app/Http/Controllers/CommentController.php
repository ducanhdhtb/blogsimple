<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use DateTime;
use App\Post;

class CommentController extends Controller
{
    //List comment
    public function getlist()
    {
    	$commenta=Comment::paginate(10);
    	return view('admin/comment/list',compact('commenta'));
    }
    //Delete Comment
    public function getdelete($id)
    {
    	$comment=Comment::find($id);
    	$comment->delete();
    	return redirect('admin/comment/list')->with('message','Your comment is completed!');

    }
    //Spend for post comment
    public function postComment($id,Request $request )
    {
        $idPost=$id;
        $post=Post::find($id);
        $comment=new Comment;
        $comment->post_id=$idPost;
        $comment->user_id=Auth::user()->id;
        $comment->content=$request->content;
        //$comment->created_at=new DateTime();
        $comment->save();
        return redirect("post/$id/{{$post->title}}.html")->with('message','Comment sends successfully!');

    }

}

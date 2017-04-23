<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;
use Auth;
use Mail;

class PagesController extends Controller
{
	//Share 
 function __construct()
    {
      $cate=Category::all();
      view()->share('cate',$cate);
      view()->composer('*', function($view) {
            $view->with('nguoidung', auth()->user());
        });
    }
	//End share
    //Get data from main page
    public function trangchu()
    {
    	$cates=Category::all();
    	$postall=Post::orderBy('id', 'DESC')->paginate(5);
    	return view('pages.trangchu',['postall'=>$postall,'cates'=>$cates]);
    }
    //Spend for Login
     function getDangNhap()
    {   
        return view('pages.dangnhap');
    }

     function postDangNhap(Request $request)
    {   
        $this->validate($request,
        [
          'email'=>'required',
          'password'=>'required|min:6|max:32'

        ],
        [
          'email.required'=>'Email trống kìa đồ ngu!',
          'password.required'=>'Không nhìn thấy mật khẩu trống à ! :))',
          'password.min'=>'Password phải trên 3 kí tự ! :))',
          'password.max'=>'Password phải dưới 32 kí tự ! :))',
        ]);
     //Kiem tra dang nhap
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
          return redirect('/');
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Đăng nhập thất bại!! ');
        }

     
    }
    //dang xuat
    function getDangXuat()
    {
        Auth::logout();
          return redirect('/');
    }
    //Nguoi dung
    function getNguoidung()
    {
        $user=Auth::user();
        return view('pages.nguoidung',['nguoidung'=>$user]);

    }

    //--------------------------------------------End login--------------------------------------------------------

    //--------------------------------------------Register-----------------------------------------
    function getDangki()
    {
        return view('pages.dangki');
    }
     function postDangki(Request $request)
    {
            $this->validate($request,
            [
                'name'=>'required|min:3',
   /*           Email khong duoc de trong ,dung dinh dang email va email khong duoc trung voi cot email trong csdl*/
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password',

            ],
            [
                'name.required'=>'Bạn chưa nhập tên đầy đủ!',
                'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
                'email.required'=>'Bạn chưa nhập  email',
                'email.email'=>'Email không đúng định  dạng',
                'email.unique'=>'Email đã tồn tại!',
                'password.required'=>'Mật khẩu không được để trống',
                'password.min'=>'Mật khẩu tối thiểu 3 kí tự',
                'password.max'=>'Mật khẩu tối đa 32 kí tự',
                'passwordAgain.required'=>'Mật khẩu không được để trống',
                'passwordAgain.same'=>'Mật khẩu phải trùng nhau',
            ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        //Upload picture ok ok ok nhe'!
        if($request->hasfile('Hinh'))
        {
            $file=$request->file('Hinh');
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/upload/avartar',$name);
            $user->avartar=$name;
        }
        else
        {
            $user->avartar="";
        }


        $user->save();
        return redirect('dangki')->with('thongbao','Chúc mừng ạn đã đăng kí thành công!');

    }
    //-------------------------------------------------Categoty-----------------------------------------
    function getCategory($id)
    {
     
      
      $category=Category::find($id);
      $posts1=Post::where('cate_id',$id)->orderBy('id','DESC')->paginate(5);
     
      return view('pages.loaitin',['cate1'=>$category,'posts1'=>$posts1]);
    }
    //----------------------------------Write blog-------------------------------------
    function getWriteBlog()
    {
      return view('pages.blog');
    }
    function postWriteBlog(Request $request)
    {
      $post =new Post;
      $post->title=$request->title;
      $post->summary=$request->summary;
      $post->content=$request->content;
      //Image process
      if($request->hasFile('image'))
        {
          //Lấy cái hình ra,Lưu hình vào cái biens file này
          $file=$request->file('image');
        //Láy cái tên hình ra để lưu lại
          $name=$file->getClientOriginalName();
        //Chọn đường dẫn lưu hình
          $file->move(public_path() . '/upload/postimage', $name);
          $post->images=$name;
        }
        else
          {
            $post->images="";
          }

        //Try

        //End try
      $post->user_id=Auth::user()->id;
      $post->cate_id=$request->select;
      $post->save();
      return redirect('writeblog')->with('message','Post Complete!');
    }
    //----------------------------------End Write blog-------------------------------------

    //Spend for posts
    function getPost($id)
    {
      $post=Post::find($id);

      return view('pages.post',compact('post'));
    }

    //Spend for Contact--------------------------------------------------------------------
      function getlienhe()
    {
        return view('pages.lienhe');
    }

    function postlienhe(Request $request)
    {
      $data=['email'=>Auth::user()->email,'name'=>Auth::user()->name,'tinnhan'=>$request->message];
      Mail::send('blank',$data,function($msg){
        $msg->from('tuanvu@gmail.com','Duc-anh');
        $msg->to('ducanhdhtb@gmail.com','alo-ok')->subject('Send from User!');
        
       
      });

       return redirect('lien-he')->with('message','Your mail has been sent!');
    }
    //Spend for searching------------------------------------------
    function timkiem(Request $request)
    {
        $tukhoa=$request->tukhoa;
        $post=Post::where('title','like',"%$tukhoa%")->orwhere('summary','like','%$tukhoa%')->take(10)->paginate(5);
        return view('pages.timkiem',compact('post','tukhoa'));
    }
    //Spend for User update
    function postNguoidung(Request $request)
    {
          $this->validate($request,
        [
          'name'=>'required|min:3',
   /*       Email khong duoc de trong ,dung dinh dang email va email khong duoc trung voi cot email trong csdl*/
        ],
        [
          'name.required'=>'Bạn chưa nhập tên đầy đủ!',
          'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
          
        
        ]);
    
              $user=Auth::user();
              $user->name=$request->name;
             //$user->email=$request->email;
    
          
        if($request->changePassword=="on")
        {
            //----------------------
                        $this->validate($request,
                  [
                   
               
                    'password'=>'required|min:3|max:32',
                    'passwordAgain'=>'required|same:password',

                  ],
                  [
                    
                    'password.required'=>'Mật khẩu không được để trống',
                    'password.min'=>'Mật khẩu tối thiểu 3 kí tự',
                    'password.max'=>'Mật khẩu tối đa 32 kí tự',
                    'passwordAgain.required'=>'Mật khẩu không được để trống',
                    'passwordAgain.same'=>'Mật khẩu phải trùng nhau',
                  ]);
              //----------------------
              $user->password=bcrypt($request->password);

        }

      $user->save();
      return redirect('nguoidung')->with('thongbao','Bạn đã sửa user thành công!');
    }

}

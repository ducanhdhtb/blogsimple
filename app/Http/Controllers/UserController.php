<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //List users------------------------------------------------
    function getlist(){
	    $user = User::paginate(2);

	 	return view('admin.user.list', ['user' => $user]);
    }
    //Add user------------------------------------------------
    function getadd()
    {
    	return view('admin.user.add');
    }
     function postadd(Request $request)
    {
    	//process
    	$this->validate($request,
    		[
    			'name'=>'required|min:3',
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
    	//$user->avartar=123;
    	//Check image
    	//Kiem tra xem người dùng có lựa chọn hình ảnh hay không nếu không sẽ mặc định là rỗng
         if($request->hasFile('Hinh'))
                {
                  //Lấy cái hình ra,Lưu hình vào cái biens file này
                  $file=$request->file('Hinh');
             
                  //Láy cái tên hình ra để lưu lại
                  $name=$file->getClientOriginalName();
               //Chọn đường dẫn lưu hình
                  $file->move(public_path() . '/upload/avartar', $name);
             /*     $file->move('upload/avartar', $name);*/
                  $user->avartar=$name;
              }
          else
          {
            $user->avartar="";
          }

    	$user->save();
    	return redirect('admin/user/add')->with('thongbao','Add User Successfully!');

    }

//Update user------------------------------------------------
     public function getupdate($id){
   		$user=User::find($id);
   		return view('admin/user/update',['user'=>$user]);
   }
   //Update User function
   public function postupdate(Request $request,$id){
          $this->validate($request,
        [
          'name'=>'required|min:3',

        ],
        [
          'name.required'=>'Bạn chưa nhập tên đầy đủ!',
          'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
       ]);
    
      $user=User::find($id);
      $user->name=$request->name;
      //$user->email=$request->email;
       $user->password=bcrypt($request->password);


      $user->save();
      return redirect('admin/user/update/'.$id)->with('thongbao','Bạn đã sửa user thành công!');
    }

    //Delete User function
    public function getdelete($id)
    {
    	$user=User::find($id);
    	$user->delete();
    	return redirect('admin/user/list')->with('thongbao','Delete Complete!');
    }

//---Spend for admin login-------------------------------------------------------------------------------
    public function getAdminlogin(){
      return view('admin.login');

     }

     public function postDangNhapAdmin(Request $request){
     
      //Dùng Hàm Auth để kiếm tra đăng nhập
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
          return redirect('admin/user/list');
        }
        else
        {
            return redirect('admin/login')->with('thongbao','Login Failed!');
        }

     }

     public function getLogout()
     {
        //log out
        Auth::logout();
        return redirect('admin/login');

     }

}

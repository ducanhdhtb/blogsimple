<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('ok', function () {
    return "Cam thay rat hai long!";
});
//Spend for admin login
Route::get('admin/login','UserController@getAdminLogin');
Route::get('admin/logout','UserController@getLogout');
Route::post('admin/dangnhap','UserController@postDangNhapAdmin');
//---------------------User manager-------------------------------------------------------
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
	
	Route::group(['prefix'=>'user'],function(){
		//List
		route::get('list','UserController@getlist');
		//Add
		route::get('add','UserController@getadd');
		route::post('add','UserController@postadd');
		//Update
		route::get('update/{id}','UserController@getupdate');
		route::post('update/{id}','UserController@postupdate');
		//Delete
		route::get('delete/{id}','UserController@getdelete');
	});
//---------------------Category manager-------------------------------------------------------

	Route::group(['prefix'=>'category'],function(){
		//List
		Route::get('list','CateController@getlist');
		//Add
		Route::get('add','CateController@getadd');
		Route::post('add','CateController@postadd');
		//Update
		Route::get('update/{id}','CateController@getupdate');
		Route::post('update/{id}','CateController@postupdate');
		//Delete
		Route::get('delete/{id}','CateController@getdelete');
		});
//----------------------Post manager----------------------------------------------------------
		Route::group(['prefix'=>'post'],function(){
		//List
		Route::get('list','PostController@getlist');
		//Add
		Route::get('add','PostController@getadd');
		Route::post('add','PostController@postadd');
		//Update
		Route::get('update/{id}','PostController@getupdate');
		Route::post('update/{id}','PostController@postupdate');
		//Delete
		Route::get('delete/{id}','PostController@getdelete');
		});
//----------------------Comment manager----------------------------------------------------------

		Route::group(['prefix'=>'comment'],function(){
		//List
		Route::get('list','CommentController@getlist');
		//Add
		//Route::get('add','PostController@getadd');
		//Route::post('add','PostController@postadd');
		//Update
		//Route::get('update/{id}','PostController@getupdate');
		//Route::post('update/{id}','PostController@postupdate');
		//Delete
		Route::get('delete/{id}','CommentController@getdelete');
		});

	
	
});
//---------------------------------Spend for User-------------------------------------------------------
Route::get('/','PagesController@trangchu');
Route::post('timkiem','PagesController@timkiem');

Route::get('dangnhap','PagesController@getDangNhap');
Route::post('dangnhap','PagesController@postDangNhap');

Route::get('dangxuat','PagesController@getDangXuat');

Route::get('dangki','PagesController@getDangki');
Route::post('dangki','PagesController@postDangki');

Route::get('nguoidung','PagesController@getNguoidung');
Route::post('nguoidung','PagesController@postNguoidung');
//----------------------User write blog
Route::get('writeblog','PagesController@getWriteBlog');
Route::post('writeblog','PagesController@postWriteBlog');




//---------------------------------Spend for Category-------------------------------------------------------
Route::get('category/{id}/{Tenkkhongdau}.html','PagesController@getCategory');
//Spend for Post nhe ahihi
Route::get('post/{id}/{Tenkkhongdau}.html','PagesController@getPost');
//Spend for comment
Route::post('comment/{id}','CommentController@postComment');

//Spend for Email---------------------------------------------------------------------------------
Route::get('lien-he','PagesController@getlienhe');
Route::post('lien-he','PagesController@postlienhe');
//Spend for serch
Route::post('timkiem','PagesController@timkiem');
//Bat cu gi ma nguoi dung nhap linh tinh tren trinh duyet se bi redirect ve trang chu
Route::any('{all?}','PagesController@trangchu')->where('all','(.*)');
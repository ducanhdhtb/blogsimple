@extends('layout.index')
@section('content')

<div class="container">

@if(session('message'))
	<div class="alert alert-success">
	{{session('message')}}
	</div>
@endif
@if(isset($nguoidung))
	<form action="writeblog" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{   csrf_token()  }}">
		<div class="form-group">
		  <label for="sel1">Blog category:</label>
		  <select class="form-control" id="sel1" name="select" style="width: 15%">
		  @foreach($cate as $c)
		    <option value="{{$c->id}}">{{$c->cate_name}}</option>
		 @endforeach
		  </select>
		</div>

		<div class="form-group" style="width: 35%">
	    <label for="inputdefault">Blog-title</label>
	    <input class="form-control" id="inputdefault" type="text" name="title">
	  	</div>

	  	<div class="form-group">
	       <label>Blog-summary</label>
	       <textarea name="summary" id="demo" class="form-control" rows="6" style="width: 35%"></textarea>
	    </div>

	    <div class="form-group">
	       <label>Blog-images</label>
	       	<input type="file" name="image">
	    </div>

		<div class="form-group">
	       <label>Blog-content</label>
	       <textarea name="content" id="demo" class="form-control ckeditor" rows="3"></textarea>
	    </div>
	    <input type="submit" value="Send" class="btn btn-danger ">
	    <input type="reset" value="Refresh" class="btn btn-success">
	</form>
	@else
	<div style="text-align: center">{!!'Please <a style="color:red" href="dangnhap">login</a> to write a post!'!!}</div>
	@endif
</div>
@endsection
@extends('layout.index')

@section('content')
 <div class="container">
    @if(isset($nguoidung))
       <div class="space20"></div>


        <div class="row main-left">
        @include('layout.menu')
            <div class="col-md-9">
         
	            <div class="panel panel-default" >   
                <form action="lien-he" method="post">  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">     
	            	<div class="panel-heading" style="background-color:#e31d7e; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Story</h2>
	            	</div>
                    
                    @if(session('message'))
                    <div class="alert alert-danger" style="text-align: center">
                        {{session('message')}}
                    </div>
                    @endif
                    <div class="form-group">
                        <h3 for="comment" style="text-align:center;font-weight: bold">Your story:</h3>
                        <textarea class="form-control ckeditor" rows="5" id="demo" name="message"></textarea>
                    </div>
                    <button style="margin-left:330px" type="submit" class="alert alert-success" value="submit">Send</button>
                    <button  type="reset" class="alert alert-danger" value="submit">Reset</button>
	            	   </form>  

					</div>
               
	            </div>
        	</div>
        </div>
        <!-- /.row -->
            @else
                <p>Please <a style="color:red" href="dangnhap">login</a> to mail</p>
          @endif
    </div>
@endsection

@extends('layout.index')
@section('content')
   <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading" style="text-align:center">Account register!</div>
				  	<div class="panel-body">
				  	 @if(count($errors)>0 )
                           <div class="alert alert-danger">

                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                 
                                @endforeach
                       		    </div> 
                       
                        @endif
                     <!--    Kiem tra xem co ton tai thong bao khong -->
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
				    	<form action="dangki" method="post" enctype="multipart/form-data">
				    	 <input type="hidden" name="_token" value="{{csrf_token()}}">

				    		<div>
				    			<label>Name</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>
				    			<label>Password</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Repassword</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Your Avartar</label>
							  	<input type="file"  name="Hinh" >
							</div>

							<br>
							<button type="submit" class="btn btn-default" style="color:red">Register
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
@endsection
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: #E31D7E;font-size: 14px;font-weight: bold;
    color: #95b719;
    padding: 1px 15px;
    margin-bottom: 10px;
    margin-left: 0px;
    border-bottom: 1px solid #E31D7E;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Blog Simple</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                 @if(isset($nguoidung))
                    <li>
                        <a href="writeblog" style="cursor: pointer">Write blog...</a>
                    </li>

                       <li>
                        <a href="lien-he" style="cursor: pointer">Contact</a>
                    </li>
                    @endif
                </ul>

                <form action="timkiem" method="post" class="navbar-form navbar-left" role="search">

			        <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
			          <input type="text" name="tukhoa" class="form-control" placeholder="Tìm Kiếm">
			        </div>
			        <button type="submit" class="btn btn-default">Search</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                   @if(!isset($nguoidung))
                    <li>
                        <a href="dangki" style="cursor: pointer">Register</a>
                    </li>
                    <li>
                        <a href="dangnhap" style="cursor: pointer">Login</a>
                    </li>
                  
                    @else
                    <li><a href="#"><img width="25px" height="25px" src="upload/avartar/{{ Auth::user()->avartar }}"></a></li>
                    <li>
                    	<a href="nguoidung">
                    		<span style="cursor: pointer" >
                           {{ Auth::user()->name }}
                            </span>

                    	</a>
                    </li>

                    <li>
                    	<a href="dangxuat" style="cursor: pointer">Sign Out</a>
                    </li>
                    @endif
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
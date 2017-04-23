@extends('layout.index')
@section('content')
 <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                

                <!-- Preview Image -->
      <!--           <img class="img-responsive" src="upload/postimage/{{$post->images}}" alt=""> -->

                <!-- Date/Time -->
              
                <p><span class="glyphicon glyphicon-time">Author:</span>
                        {{$post->user->name}}
                 </p>
            
                <p><span class="glyphicon glyphicon-time"></span> Created  at:{{$post->created_at}}</p>
                <hr>

                <!-- Post Content -->
                {!! $post->content!!}

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(isset($nguoidung))
                <div class="well">
                    @if(session('message'))
                        {{session('message')}}
                    @endif
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="comment/{{$post->id}}" role="form" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                @else
                    <p>You need to <a style="color: red" href="dangnhap">login</a> to comment!</p>
                @endif

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($post->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img width="50px" height="50px" class="media-object" src="upload/avartar/{{$cm->user_comment->avartar}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user_comment->name}}
                            <small>{{$cm->created_at}}</small>
                       
                        </h4>
                     {{$cm->content}} 
                    </div>
                </div>
                @endforeach
         

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Post </b></div>
                    <div class="panel-body">

                        <!-- item -->
                      
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="">
                                    <img class="img-responsive" src="" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href=""><b></b></a>
                            </div>
                            <p><small></small></p>
                            <div class="break"></div>
                        </div>
                    
                        <!-- end item -->

               
                        <!-- end item -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Special post</b></div>
                    <div class="panel-body">

                        <!-- item -->
                
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="">
                                    <img class="img-responsive" src="" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href=""><b></b></a>
                            </div>
                            <p><small></small></p>
                            <div class="break"></div>
                        </div>
                       
                
                        <!-- end item -->

                      
                        <!-- end item -->
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
@endsection
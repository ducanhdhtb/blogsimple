
@extends('layout.index')
@section('content')
 <div class="container">
        <div class="row">
           @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background:#E31D7E">
                    <h1>

                    </h1>
                        <h2 style="text-align:center"><b>Lastest Posts</b></h2>
                        </div>
                        @foreach($postall as $post)
                        <div class="row-item row">
                            <div class="col-md-3">

                                <a  href="post/{{$post->id}}/{{$post->title}}.html">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="upload/postimage/{{$post->images}}" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3 style="color:#d9534f;font-size: 19px">{{$post->title}}</h3>
                                <span style="font-style: italic;font-size: 16px;color: royalblue">{!!$post->summary!!}</span>
                                <p><b style="color:#ffc0cb">Category :</b> <span style="color:pink">{{$post->category->cate_name}} <span style="margin-left:240px">Update:{{$post->created_at}}</span></span></p>
                            <a class="btn btn-danger" href="post/{{$post->id}}/{{$post->title}}.html">Xem thêm...</a>
                            </div>
                            <div class="break"></div>
                        </div>
                    @endforeach
      
                    <!-- Pagination -->
             
               <div style="text-align:center">{{$postall->links()}}</div> 
                    <!-- /.row -->
					</div>
                </div>
            </div> 

        </div>

    </div>
@endsection

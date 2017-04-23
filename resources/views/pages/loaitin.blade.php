@extends('layout.index')
@section('content')
 <div class="container">
        <div class="row">
        @include('layout/menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#E31D7E; color:white;">
                    <h1>

                    </h1>
                        <h3><b>{{$cate1->cate_name}}</b></h3>
                        <h2></h2>
                    </div>
                 
                    @foreach($posts1 as $p)
                    <div class="row-item row">
                        <div class="col-md-3">
                   
                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/postimage/{{$p->images}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9" >
                            <h3 style="color:purple">{{$p->title}}</h3>
                            <i style="color:red">{!!$p->summary!!}</i>
                            <p>Author:{{$p->user->name}}</p>
                            <a style="background: #E31D7E" class="btn btn-primary" href="post/{{$p->id}}/{{$p->title}}.html">Read more...</a>
                        </div>
                        <div class="break" style="border-bottom: 1px solid red"></div>
                    </div>
                  
               @endforeach

                    <!-- Pagination -->
                    <div style="text-align: center;">
                {{$posts1->links()}}
                    <!-- /.row -->
                    </div>
                </div>
            </div> 

        </div>

    </div>
@endsection
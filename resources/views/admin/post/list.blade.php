 @extends('admin.layout.index')
@section('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Post lists
                        
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('message'))
                    <marquee >
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                    </marquee>
                        @endif
                  
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center" style="background: #c0ff00">
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center">Summary</th>
                                <th style="text-align: center">Content</th>
                                <th style="text-align: center">Image</th>
                                <th style="text-align: center">Poster</th>
                                <th style="text-align: center">Category</th>
                                <th style="text-align: center">Delete</th>
                                <th style="text-align: center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posta as $post)
                            <tr class="odd gradeX" align="center">
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{!!$post->summary!!}</td>
                                <td><textarea name="" id="" cols="20" rows="5">{!!$post->content!!}</textarea></td>
                                <td><img width="100px" height="100px" src="upload/postimage/{{$post->images}}" alt=""></td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->category->cate_name}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/post/delete/{{$post->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/update/{{$post->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                     <div style="text-align: center">{{ $posta->links() }}</div>    
                  
                 
                </div>
         
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
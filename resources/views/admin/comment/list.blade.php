 @extends('admin.layout.index')
@section('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comments
                            <small></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                   @if(count($commenta)>0)
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                     @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif
                        <thead>
                            <tr align="center" style="background: rebeccapurple;text-align:center">
                                <th>ID</th>
                                <th>Content</th>
                                <th>Post</th>                               
                                <th>User</th>                               
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($commenta as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->content}}</td>
                                <td>{{$cm->comment_post->title}}</td>
                                <td>{{$cm->user_comment->name}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$cm->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/comment/update/{{$cm->id}}">Edit</a></td>
                            </tr>
                        @endforeach   
                        </tbody>
                    </table>
                @else
                <marquee >{{"Not Comment yes!"}}</marquee>

                 @endif
                </div>
                <!-- /.row -->
                <div style="text-align: center">{{$commenta->links()}}</div>
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
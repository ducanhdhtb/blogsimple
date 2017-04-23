 @extends('admin.layout.index')
@section('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List-user
                        
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                          {{session('thongbao')}}
                    </div>
                  
                    @endif
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                  
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center" style="background: #c0f6ff">
                                <th style="text-align:center">ID</th>
                                <th style="text-align:center">Name</th>
                                <th style="text-align:center">Avartar</th>
                                <th style="text-align:center">email</th>
                                <th style="text-align:center" width="100px">password</th>
                                <th style="text-align:center">Delete</th>
                                <th style="text-align:center">Edit</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $u)
                            <tr class="odd gradeX" align="center">
                                <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td><img width="150px" height="150px" src="upload/avartar/{{$u->avartar}}" alt=""></td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->password}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$u->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/update/{{$u->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                           
                        </tbody>
                    </table>
                    <div style="text-align:center"> {{$user->links()}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
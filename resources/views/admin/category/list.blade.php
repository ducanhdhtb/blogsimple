 @extends('admin.layout.index')
@section('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category-List
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class='alert alert-success'>
                        {{session('thongbao')}}
                        </div>
                    @endif
                    @if(count($cate)>0)
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center" style="background:rebeccapurple;color:red">
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Category name</th>
                                <th style="text-align: center">Delete</th>
                                <th style="text-align: center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cate as $cate)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cate->id}}</td>
                                <td>{{$cate->cate_name}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/delete/{{$cate->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/update/{{$cate->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                      
                      @else
                            <marquee >
                            <p style="color:red,font-weight:bold">
                            {{"Data empty!"}}
                            </p>
                            </marquee>
                        
                
                        @endif
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
@endsection
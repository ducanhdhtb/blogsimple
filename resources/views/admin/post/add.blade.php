 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Post
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                       <!-- Hien thi thong bao loi -->
                        @if(count($errors)>0 )
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>

                                @endforeach
                             </div>
                       
                        @endif
                     <!--    Kiem tra xem co ton tai thong bao khong -->
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                         @if(session('loi'))
                            <div class="alert alert-success">
                                {{session('loi')}}
                            </div>
                        @endif
                        <form action="admin/post/add" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <!-- Post lists -->
                            <div class="form-group">
                                <label>Post lists</label>
                                <select class="form-control" name="cate" >
                                   @foreach($cate as $cate)
                                    <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <!-- End post lists -->
                        <!-- List user -->
                        <div class="form-group">
                                <label>User lists</label>
                                <select class="form-control" name="user">
                                   @foreach($user as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <!-- List user -->
                        
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="title" placeholder="Vui lòng nhập tiêu đề" />
                            </div>
                         <!--  Tom tat -->
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea name="summary" id="demo" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                          <!--   Noi dung -->
                          <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="content" id="demo" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                        <!--     END NOI DUNG -->
                      <!--   Phan hinh anh -->
                      <div class="form-group">
                          <label>Hình</label>
                          <input type="file" name="Hinh">
                      </div>
                      <!--   End Phan hinh anh -->
                            
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection

        @section('script')
        <script >
            $(document).ready(function(){
                $('#TheLoai').change(function(){
                    var idTheLoai=$(this).val();
                    //alert(idTheLoai);
                    $.get("admin/ajax/loaitin/"+idTheLoai,function(data){

                        $("#LoaiTin").html(data);
                        //alert(data);
                    });
                  
                });
            });
        </script>
        @endsection
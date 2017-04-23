 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Update post
                            <small></small>
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
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                         @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        <form action="admin/post/update/{{$post->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <!-- Category select -->
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="cate" >
                                @foreach($cate as $cate)
                                    <option
                                    @if($post->category->id==$cate->id){{'selected'}}
                                    @endif
                                    value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                @endforeach
                               
                                </select>
                            </div>
                        <!-- User select -->
                      
                        <div class="form-group">
                                <label>User</label>
                                <select class="form-control" name="user" readonly='readonly' >
                                @foreach($user as $user)
                                    <option 
                                    @if($post->user->id==$user->id)
                                    {{"selected"}}
                                      @endif
                                    }
                                    }
                                    value="{{$user->id}}" 

                                    >
                                    {{$user->name}}
                                   </option>
                                @endforeach
                             --}
                                </select>
                            </div>
                        <!-- end danh cho loaitin -->
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="title"  value="{{$post->title}}" />
                            </div>
                         <!--  Tom tat -->
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea name="summary" id="demo" class="form-control ckeditor" rows="3">
                                   {{$post->summary}}
                                    
                                </textarea>
                            </div>
                          <!--   Noi dung -->
                          <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="content" id="content" class="form-control ckeditor" rows="3">
                                   {{$post->content}}
                                </textarea>
                            </div>
                        <!--     END NOI DUNG -->
                      <!--   Phan hinh anh -->
                      <div class="form-group">
                          <label>Hình</label>
                          <p><img width="150px" height="150px" src="upload/postimage/{{$post->images}}"></p>
                          <input type="file" name="img">
                      </div>
                      <!--   End Phan hinh anh -->
                          
                            <button type="submit" class="btn btn-default">Update</button>
                            <button type="reset" class="btn btn-default">Refresh Noe!</button>
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
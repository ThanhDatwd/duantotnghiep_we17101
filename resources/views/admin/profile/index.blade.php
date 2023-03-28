@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
<link rel="stylesheet" href="{{asset('css/admin/profile/profile.css')}}">

@endsection
@section('content')
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6" style="width: 40%">
                        <div class="bg-light rounded h-100 p-4">
                           
                            <div class="character">
  <div class="avatar">
  
  </div>
  <div class="stats">
    <ul>
    
      <li><i class="fa fa-fw fa-shield"></i>Chức vụ: <span id="con">Admin</span></li>
      <li><i class="fa fa-fw fa-book"></i>Tình trạng làm việc: <span id="int">Hoạt động</span></li>
      <li><i class="fa fa-fw fa-eye"></i>Số lượng bài viết: <span id="per">
  {{$count_news}}   
    </span></li>
    </ul>
  </div>
  <hr />
  <h1>Admin<span>
{{Auth::guard('admin')->user()->username}}    
</span></h1>
</div>
                           
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6" style="width: 60%">
                        <div class="bg-light rounded h-100 p-4">
                            
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Họ và Tên</label>
                                   
                                   
                                   <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::guard('admin')->user()->full_name}}" disabled>
 
                                    
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                   
                                   
                                   <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::guard('admin')->user()->email}}" disabled>
 
                                    
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                                     <input type="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::guard('admin')->user()->phone}}" disabled>
                                </div>
                              
                                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            </form>
                        </div>
                        
                        
                    </div>
               
                </div>
                
           <div class="row g-4" style="margin-top: 30px">
            <form action="{{url('admin/news/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
                         @csrf

                 
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Danh sách tin tức bạn viết</h6>
                            <div class="table-responsive">
                       <table class="table">
                     <thead>
                     <tr>
                  <th></th>
                  <th scope="col">Check</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Tiêu đề</th>
                  <th scope="col">Nội dung</th>
                  <th scope="col">Tác giả</th>
                  <th scope="col">Chỉnh sửa</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($count_news as $item)
              <tr>
                <th></th>
                  <td><input type="checkbox" name="check[]" value="{{$item->id}}"></td>
                  <td><img src="{{asset('upload/'.$item->thumb)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" >
                  </td>
                  {{-- <td><img src="{{$p->thumb}}" alt=""></td> --}}
              <td>{{$item->title}}</td>
                                        <td>{{$item->summary}}</td>
                                        <td>
                                            {{$item->created_by}}
                                        </td>

                
                
                  
                  {{-- <td>{{$categories->$p->name}}</td> --}}
                  <td class="button">
                    <a style="color: cadetblue" href="{{url('admin/news/capnhat/'.$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a style="color: red" href="{{url('admin/news/xoa/'.$item->id)}}" onclick="return myFunction();"> <i  class="fa-sharp fa-solid fa-trash"></i> </a>
                   
                

                    {{-- <button onclick="myFunction()">XÓa</button> --}}
                    <script>
                      function myFunction() {
                          if(!confirm("Bạn có chắc chắn muốn xóa không!!"))
                          event.preventDefault();
                      }
                     </script>
                  </td>

              </tr>
              @endforeach
          </tbody>
        
          
      </table>


                                
                                  <nav aria-label="Page navigation example">
        <ul class="pagination" style="display: flex;justify-content:space-between;">
     
       
          
           <li>
              <a href="{{url('admin/news/them')}}" class="btn btn-primary">Thêm</a>
                                                  
                                            <a href="{{url('admin/news/thung-rac')}}" class="btn btn-primary">Thùng rác
                                                <?php
                                                $count = DB::table('news')->where('deleted_at','!=',null)->count();
                                                ?>
                                                ({{$count}})
                                                
                                            </a>
                                                <button type="submit" class="btn btn-danger">Xóa nhiều</button>
                  </li>
         
      
        </ul>
      </nav>
                            </div>
                        </div>
                    
            
            



</form>
            </div> 
</div>
<div class="container-fluid pt-4 px-4">
   

</div>


@endsection
@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('admin/news/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
@csrf

                 
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Quản lý tin tức</h6>
                            <div class="table-responsive">
                       <table class="table">
          <thead>
              <tr>
                  <th></th>
                  <th scope="col">ID</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giảm giá</th>
                  <th scope="col">Đơn giá</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($news as $item)
              <tr>
                <th></th>
                  <td><input type="checkbox" name="check[]" value="{{$item->id}}"></td>
                  <td><img src="{{asset('upload/'.$item->thumb)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" >
                  </td>
                  {{-- <td><img src="{{$p->thumb}}" alt=""></td> --}}
              <td>{{$item->title}}</td>
                                        <td>{{$item->summary}}</td>
                                        <td>author</td>

                
                
                  
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
     
           <li> {{$news->appends(request()->all())->links()}}  </li>
          
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

@endsection

</form>
  


 
@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('admin/banner/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
@csrf

                 
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Quản lý banner</h6>
                            <div class="table-responsive">
                       <table class="table">
                     <thead>
                     <tr>
                  <th></th>
                  <th scope="col">Check</th>
                  <th scope="col">Hình ảnh</th>
                  
                  <th scope="col">Chỉnh sửa</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($banner as $item)
              <tr>
                <th></th>
                  <td><input type="checkbox" name="check[]" value="{{$item->id}}"></td>
                  <td><img src="{{asset('upload/'.$item->url)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" >
                  </td>
                  {{-- <td><img src="{{$p->thumb}}" alt=""></td> --}}
      
                  
                  {{-- <td>{{$categories->$p->name}}</td> --}}
                  <td class="button">
                    <a style="color: cadetblue" href="{{url('admin/banner/capnhat/'.$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a style="color: red" href="{{url('admin/banner/xoa/'.$item->id)}}" onclick="return myFunction();"> <i  class="fa-sharp fa-solid fa-trash"></i> </a>
                   
                

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
     
           <li> {{$banner->appends(request()->all())->links()}}  </li>
          
           <li>
              <a href="{{url('admin/banner/them')}}" class="btn btn-primary">Thêm</a>
                                                  
                                          
                                                <button type="submit" class="btn btn-danger">Xóa nhiều</button>
                  </li>
         
      
        </ul>
      </nav>
                            </div>
                        </div>
                    
            
            



</form>
@endsection

  


 
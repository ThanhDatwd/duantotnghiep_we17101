@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
@endsection
@section('content')

<div class="bg-light rounded h-100 p-4">
 <div class="text">
  <h2 class="">Danh sách loại sản phẩm</h2>
  <a href="/admin/product_category/create"><i class="fa-solid fa-circle-plus"></i> Thêm loại sản phẩm</a>
 </div>

  @if(Session::has('thongbao'))
    <div class="alert alert-success">
      {{Session::get('thongbao')}}
    </div>
  @endif
</a>

  <div class="table-responsive">
      <table class="table">
          <thead>
              <tr>
                  <th></th>
                  <th scope="col">ID</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Tên sản phẩm</th> 
                  <th scope="col">Thứ tự hiện</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($categories as $c)
              <tr>
                <th></th>
                  <th>{{$c->id}}</th>
                  <td><img src="{{asset('upload/'.$c->thumb)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" >
                  </td>
                  {{-- <td><img src="{{$p->thumb}}" alt=""></td> --}}
                  <td>
                    <p style="font-size: 18px; font-weight:bold">{{$c->category_name}}</p>
                    <p>{{$c->slug}}</p>
                  </td>
                  <td>{{$c->stt}}</td>
                 
                 <td>
                    <span>
                      @if(($c->is_active)==1)
                      <button type="button" class="btn btn-success">Hiện</button>
                      @else
                      <button type="button" class="btn btn-danger">Ẩn</button>                  
                    @endif
                    </span>
                  </td>
                  {{-- <td>{{$categories->$p->name}}</td> --}}
                  <td class="button">
                    <a style="color: cadetblue" href="/admin/product_category/update/{{$c->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a style="color: red" href="/admin/product_category/delete/{{$c->id}}" onclick="return myFunction();"> <i onclick="myFunction()" class="fa-solid fa-trash-can"></i> </a>
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
        <ul class="pagination">
     
            {{$categories->appends(request()->all())->links()}}  
         
      
        </ul>
      </nav>
  </div>
</div>
@endsection
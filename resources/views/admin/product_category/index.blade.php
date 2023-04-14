@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
@endsection
@section('content')
<div class="p-4">
  @if(Session::has('thongbao'))
  <div class="alert alert-success">
    {{Session::get('thongbao')}}
  </div>
  @endif
  <div class="text-start">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div>Danh sách loại sản phẩm</div>
        <div class="adding">
          <a href="/admin/product_category/create"><i class="fa-solid fa-circle-plus fs-3"></i></a>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
      <table class="table table-hover align-middle">
          <thead class="text-dark table-info">
              <tr>
                  <th></th>
                  <th scope="col">ID</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Danh mục</th>
                  <th scope="col">Nhóm danh mục</th> 
                  <th scope="col" class="text-center">Thứ tự hiện</th>
                  <th scope="col" class="text-center">Trạng thái</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($categories as $c)
              <tr>
                <th></th>
                  <th>{{$c->id}}</th>
                  <td><img style="width:50px; height:50px" src="{{asset('upload/'.$c->thumb)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" >
                  </td>
                  {{-- <td><img src="{{$p->thumb}}" alt=""></td> --}}
                  <td>
                    <p style="font-size: 18px; font-weight:bold">{{$c->category_name}}</p>
                    
                  </td>
                  <td>{{$c->category_group->name}}</td>
                  <td class="text-center">{{$c->stt}}</td>
                 
                 <td class="text-center">
                    <span>
                      @if(($c->is_active)==1)
                      <button class="btn btn-sm btn-success rounded-pill">Hiện</button>
                      @else
                      <button class="btn btn-sm btn-secondary rounded-pill">Ẩn</button>                  
                    @endif
                    </span>
                  </td>
                  {{-- <td>{{$categories->$p->name}}</td> --}}
                  <td class="">
                    <a style="color: cadetblue" href="/admin/product_category/update/{{$c->id}}"><i class="bi bi-pencil-square"></i></a>
                    <a style="color: red" href="/admin/product_category/delete/{{$c->id}}" onclick="return myFunction();"><i class="bi bi-trash"></i> </a>
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
    </div>
  </div>
</div>
</div>
<div class="mt-2">
<nav aria-label="Page navigation example ">
  <ul class="pagination">
    {{$categories->appends(request()->all())->links()}}  
  </ul>
</nav>
</div>
</div>
 
@endsection
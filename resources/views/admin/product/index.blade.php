@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content')

<div class="bg-light rounded h-100 p-4">
 <div class="text">
  <h2 class="">DANH SÁCH SẢN PHẨM </h2>
  <a href="/admin/product/create"><i class="fa-solid fa-circle-plus"></i> Thêm sản phẩm</a>
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
                  <th scope="col">Giảm giá</th>
                  <th scope="col">Đơn giá</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($products as $p)
              <tr>
                <th></th>
                  <th>{{$p->id}}</th>
                  <td><img src="{{asset('upload/'.$p->thumb)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" >
                  </td>
                  {{-- <td><img src="{{$p->thumb}}" alt=""></td> --}}
                  <td>
                    <p style="font-size: 18px; font-weight:bold">{{$p->name}}</p>
                    <span>Loại: {{$p->category->category_name}}</span><br>
                    <span>Xuất sứ: {{$p->brand}}</span>
                  </td>

                  <td>{{$p->discount}} %</td>
                  <td> 
                    <span>Mới: {{ number_format($p->price_current, 0) }} vnđ </span><br>
                    <small>Cũ: {{ number_format($p->price, 0) }} vnđ</small>
                  </td>
                  <td>
                    <span>
                      @if(($p->is_active)==1)
                      <button type="button" class="btn btn-success">Còn hàng</button>
                      @else
                      <button type="button" class="btn btn-danger">Hết hàng</button>                  
                    @endif
                    </span>
                  </td>
                  {{-- <td>{{$categories->$p->name}}</td> --}}
                  <td class="button">
                    <a style="color: cadetblue" href="/admin/product/update/{{$p->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a style="color: red" href="/admin/product/delete/{{$p->id}}" onclick="return myFunction();"> <i onclick="myFunction()" class="fa-sharp fa-solid fa-trash"></i> </a>

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
     
            {{$products->appends(request()->all())->links()}}  
         
      
        </ul>
      </nav>
  </div>
</div>

@endsection
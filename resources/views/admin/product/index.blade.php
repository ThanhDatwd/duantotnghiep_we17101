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
        <div>Danh sách sản phẩm</div>
        <div class="adding">
          <a href="/admin/product/create"><i class="fa-solid fa-circle-plus fs-3"></i></a>
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
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Khuyến mãi</th>
                <th scope="col">Trạng thái</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

              @foreach ($products as $p)
              <tr>
                <th></th>
                <th>{{$p->id}}</th>
                <td><img style="width:50px; height:50px" src="{{asset('upload/'.$p->thumb)}}" alt=""
                    onerror="this.src='{{asset('upload/error.jpg')}}'">
                </td>
                {{-- <td><img src="{{$p->thumb}}" alt=""></td> --}}
                <td>
                  <strong style="font-size: 18px; font-weight:bold">{{$p->name}}</strong><br />
                  <span>Loại: {{$p->category->category_name ?? 'Chưa phân loại'}}</span>
                </td>
                <td> {{ number_format($p->price_current, 0) }} vnđ </td>
                <td>{{$p->discount}} %</td>
                <td>
                  <span>
                    @if($p->quantity_input>$p->quantity_output)
                    <button type="button" class="btn btn-sm btn-success rounded-pill">Còn hàng</button>
                    @else
                    <button type="button" class="btn btn-sm btn-secondary rounded-pill">Hết hàng</button>
                    @endif
                  </span>
                </td>
                {{-- <td>{{$categories->$p->name}}</td> --}}
                <td>
                  <a style="color: cadetblue" href="/admin/product/update/{{$p->id}}"><i
                      class="bi bi-pencil-square"></i></a>
                  <a style="color: red" href="/admin/product/delete/{{$p->id}}" onclick="return myFunction();">
                    <i class="bi bi-trash"></i> </a>
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
        {{$products->appends(request()->all())->links()}}
      </ul>
    </nav>
  </div>
</div>

@endsection
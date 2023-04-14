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
        <div>Danh sách mã giảm giá</div>
        <div class="adding">
          <a href="/admin/product/create"><i class="fa-solid fa-circle-plus fs-3"></i></a>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
      <table class="table table-hover align-middle">
          <thead>
              <tr class="text-dark table-info">
                  <th scope="col">ID</th>
                  <th scope="col">Mã giảm giá</th>
                  <th scope="col">Loại giảm giá</th>
                  <th scope="col">Giảm giá</th>
                  <th scope="col">Giới hạn </th>
                  <th scope="col">Đã dùng</th>
                  <th scope="col">Bắt đầu</th>
                  <th scope="col">Kết thúc</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($coupons as $c)
              <tr>
                  <th>
                    {{$c->id}}
                  </th>
                  <td> 
                    {{$c->coupon_code}}
                </td>
                  <td>
                    @if ($c->coupon_type == '1')
                    <div>Giảm giá theo số tiền</div>
                    @elseif ($c->coupon_type == '2')
                    <div>Giảm giá theo %</div>
                    @else
                    <div>Free ship</div>
                  @endif
                  </td>
                  <td> 
                    {{$c->discount}}
                  </td>
                  <td>{{$c->limit_used}}</td>
                  <td>{{$c->user_used}}</td>
                  <td>{{ date('d-m-Y', strtotime($c->start_date)) }}</td>
                  <td>{{ date('d-m-Y', strtotime($c->end_date)) }}</td>
                  <td>
                    <span>
                      @if(strtotime($c->end_date) > strtotime(date('Y-m-d')))
                      <button type="button" class="btn btn-sm btn-success rounded-pill" disabled>Hoạt động</button>
                      @else
                      <button type="button" class="btn btn-sm btn-secondary rounded-pill" disabled>Hết hạn</button>                  
                    @endif
                    </span>
                  </td>
                  {{-- <td>{{$categories->$p->name}}</td> --}}
                  <td >
                    <a style="color: cadetblue" href="/admin/coupon/update/{{$c->id}}"><i class="bi bi-pencil-square"></i></a>
                    <a style="color: red" href="/admin/coupon/delete/{{$c->id}}" onclick="return myFunction();"><i class="bi bi-trash"></i> </a>

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
    {{$coupons->appends(request()->all())->links()}}  
  </ul>
</nav>
</div>
</div>
  @endsection
  
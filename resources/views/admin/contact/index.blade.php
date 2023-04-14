@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content') 
<div class="bg-light rounded h-100 p-4">
 <div class="text d-flex justify-content-between">
  <div class="">DANH SÁCH MÃ GIẢM GIÁ </div>
  <div class="adding">
     <a href="/admin/coupon/create"><i class="fa-solid fa-circle-plus fs-3"></i></a>
  </div>
 </div>
  @if(Session::has('thongbao'))
    <div class="alert alert-success">
      {{Session::get('thongbao')}}
    </div>
  @endif
</a>
  <div class="table-responsive">
      <table class="table table-hover align-middle">
          <thead>
              <tr class="text-dark table-info">
                  <th scope="col">ID</th>
                  <th scope="col">Người gửi</th>
                  <th scope="col">Tiêu đề</th>
                  <th scope="col">Ngày</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($customer_emails as $item )
                <tr class="">
                    <td scope="col"><i class="bi bi-envelope"></i></td>
                    <td scope="col">{{$item->customer_name}}</td>
                    <td scope="col">{{$item->subject}}</td>
                    <td scope="col">{{ date('d-m-Y', strtotime($item->created_at))}}</td>
                    <td>
                        <a href="{{route('siteshow-email',['id'=>$item->id])}}">Xem</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{$customer_emails->appends(request()->all())->links()}}  
        </ul>
      </nav>
  </div>
</div>
@endsection
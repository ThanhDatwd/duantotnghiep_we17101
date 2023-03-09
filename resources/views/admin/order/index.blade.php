@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
@endsection
@section('content')

<div class="bg-light rounded h-100 p-4">
 <div class="text">
  <h2 class="">Danh sách đơn hàng</h2>
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
                  <th scope="col">Tên người đặt</th>
                  <th scope="col">Loại thanh toán</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Phí giao hàng</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col" style="50px">Chú thích của khách hàng</th>
                  <th scope="col">Chú thích của shop</th>
                  <th scope="col">Tổng tiền</th> 
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
           @foreach ($order as $o)
                <tr>
                    <th></th>
                    <th>{{$o->id}}</th>
                    <td>{{$o->user->full_name}}</td>

                    <td>

                        @if ($o->payment_type==1)
                        Online
                        @elseif ($o->payment_type==2)
                        Cod
                        @elseif ($o->payment_type==3)
                        ATM
                        @else
                        Chưa phân loại
                        @endif
                    </td>
                    <td>{{$o->count_products}}</td>
                    <td>{{$o->fee_ship}}</td>
                    <td>
                        @if ($o->status==1)
                        Chờ xác nhận
                        @elseif ($o->status==2)
                        Xác nhận
                        @elseif ($o->status==3)
                        Đang giao
                        @else
                        Hoàn thành
                        @endif
                    </td>
                    
                    <td><p class="note">{{$o->customer_note}}</p></td>
                    <td><p class="note"> {{$o->shop_note}}</p></td>
                    <td>{{$o->total_price}}</td>
                    <td> <a style="color: green" href="/admin/order/detail/{{$o->id}}"> <i class="fa-solid fa-circle-info"></i> </a>
                    </td>
                </tr>
           @endforeach
          </tbody>
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
     
            {{$order->appends(request()->all())->links()}}  
         
      
        </ul>
      </nav>
  </div>
</div>
@endsection
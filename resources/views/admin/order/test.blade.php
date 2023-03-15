@foreach ($order as $o)
@if ($o->status==1)
<div class="table-responsive">
  <table class="table">
      <thead>
          <tr>
              <th></th>
              <th scope="col">ID</th>
              <th scope="col">Tên người đặt</th>
              <th scope="col">Loại thanh toán</th>
              <th scope="col">Số điện thoại</th>
              <th scope="col">Phí giao hàng</th>
            
              <th scope="col">Tổng tiền</th> 
              <th scope="col">Trạng thái</th>
              <th scope="col"></th>
          </tr>
      </thead>
      <tbody>
       @foreach ($order as $o)
        @if ($o->status==1)
          
            <tr>
                <th></th>
                <th>{{$o->id}}</th>
                <td>{{$o->user_name}}</td>
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
                <td>{{$o->phone}}</td>
                <td>{{$o->fee_ship}}</td>
                <td>{{$o->total}}</td>
            
                <td> <a style="color: green" href="/admin/order/detail/{{$o->id}}"> <i class="fa-solid fa-circle-info"></i> </a>
                </td>
            </tr>
            @endif
       @endforeach
      </tbody>
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
        {{$order->appends(request()->all())->links()}}  
    </ul>
  </nav>
</div>
@endif
              @endforeach
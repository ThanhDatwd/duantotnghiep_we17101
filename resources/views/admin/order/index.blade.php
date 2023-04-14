@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
@endsection
@section('content')

<div class="bg-light rounded h-100 p-4">
  <div class="text d-flex justify-content-between">
    <div class="">DANH SÁCH ĐƠN ĐẶT HÀNG</div>
    <div class="adding">
       <a href="/admin/product_category/create"><i class="fa-solid fa-circle-plus fs-3"></i></a>
    </div>
   </div>

  @if(Session::has('thongbao'))
    <div class="alert alert-success">
      {{Session::get('thongbao')}}
    </div>
  @endif
  <style>
    /*
 CSS for the main interaction
*/
.tabset > input[type="radio"] {
  position: absolute;
  left: -200vw;
}

.tabset .tab-panel {
  display: none;
  
}

.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
  display: block;
}

/*
 Styling
*/

.tabset > label {
  position: relative;
  display: inline-block;
  padding: 15px 15px 20px ;
  border: 1px solid transparent;
  border-bottom: 0;
  cursor: pointer;
  font-weight: 600;
  background: var(--primary);
  color:#fff;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}

.tabset > label::after {
  content: "";
  position: absolute;
  left: 15px;
  bottom: 10px;
  width: 22px;
  height: 4px;
  background: #fff;
}

.tabset > label:hover,
.tabset > input:focus + label {
  color:var(--primary);
}

.tabset > label:hover::after,
.tabset > input:focus + label::after,
.tabset > input:checked + label::after {
  background: var(--primary);
}

.tabset > input:checked + label {
  border-color: #ccc;
  border-bottom: 1px solid #fff;
  margin-bottom: -1px;
  background: #fff;
  color: var(--primary);
}

.tab-panel {
  padding: 10px 10px 0 10px;
  border-top: 1px solid #ccc;
}

/*
 Demo purposes only
*/
*,
*:before,
*:after {
  box-sizing: border-box;
}



.tabset {
  max-width: 100%;
  background: #fff;
  border-radius: 20px
}
  </style>

<div class="tabset">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1" aria-controls="tab1" checked>
  <label for="tab1">Đang chờ xác nhận </label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" aria-controls="tab2">
  <label for="tab2">Xác nhận</label>
  <!-- Tab 3 -->
  <input type="radio" name="tabset" id="tab3" aria-controls="tab3">
  <label for="tab3">Đang giao</label>
  <input type="radio" name="tabset" id="tab4" aria-controls="tab4">
  <label for="tab4">Hoàn thành</label>
  
  <div class="tab-panels">
    <section id="tab1" class="tab-panel">
      
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
        @if ($o->status == 1)
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
            
                <td> <a style="color: green" href="/admin/order/detail/{{$o->id}}"> <button type="button" class="btn btn-outline-success">Chi tiết</button>
                </a>
                </td>
            </tr>
            @endif
@endforeach
      </tbody>
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
        {{-- {{$order->appends(request()->all())->links()}}   --}}
    </ul>
  </nav>
</div>

    </section>
    <section id="tab2" class="tab-panel">
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
              @if ($o->status == 2)
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
                  
                      <td> <a style="color: green" href="/admin/order/detail/{{$o->id}}"> <button type="button" class="btn btn-outline-success">Chi tiết</button>
                      </a>
                      </td>
                  </tr>
                  @endif
      @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
              {{-- {{$order->appends(request()->all())->links()}}   --}}
          </ul>
        </nav>
      </div>
    </section>
    <section id="tab3" class="tab-panel">
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
              @if ($o->status == 3)
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
                  
                      <td> <a style="color: green" href="/admin/order/detail/{{$o->id}}"> <button type="button" class="btn btn-outline-success">Chi tiết</button>
                      </a>
                      </td>
                  </tr>
                  @endif
      @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
              {{-- {{$order->appends(request()->all())->links()}}   --}}
          </ul>
        </nav>
      </div>    </section>
    <section id="tab4" class="tab-panel">
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
              @if ($o->status == 4)
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
                  
                      <td> <a style="color: green" href="/admin/order/detail/{{$o->id}}"> <button type="button" class="btn btn-outline-success">Chi tiết</button>
                      </a>
                      </td>
                  </tr>
                  @endif
      @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
              {{-- {{$order->appends(request()->all())->links()}}   --}}
          </ul>
        </nav>
      </div>
    </section>
  </div>
  
</div>

@endsection
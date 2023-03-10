@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content') 
<div class="bg-light rounded h-100 p-4">
 <div class="text">
  <h2 class="">THÙNG RÁC MÃ GIẢM GIÁ </h2>
  <a href="/admin/coupon/create"><i class="fa-solid fa-circle-plus"></i> Thêm mã giảm giá</a>
 </div>
  @if(Session::has('thongbao'))
    <div class="alert alert-success">
      {{Session::get('thongbao')}}
    </div>
  @endif
</a>
  <div class="table-responsive">
    <a href="restore-all"  ><button type="button" class="btn btn-success m-2"><i class="fa fa-home me-2"></i>Khôi Phục Tất Cả</button>

      <table class="table">
          <thead>
              <tr>
                  <th></th>
                  <th scope="col">ID</th>
                  <th scope="col">Mã giảm giá</th>
                  <th scope="col">loại giảm giá</th>
                  <th scope="col">Giảm giá</th>
                  <th scope="col">Giới hạn người dùng </th>
                  <th scope="col">Bắt đầu </th>
                  <th scope="col">Kết thúc</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($coupons as $c)
              <tr>
                <th></th>
                  <th>{{$c->id}}</th>
                  <td> 
                    {{$c->coupon_code}}
                </td>

                  <td>
                    {{$c->coupon_type}}
                   
                  </td>

                  
                  <td> 
                    {{$c->discount}}
                  </td>
                  <td>{{$c->limit_used}}</td>
                  <td>
                    
                    <p>Từ: {{ date(' H:i:s', strtotime($c->start_date)) }} <br>
                   {{ date('d-m-Y', strtotime($c->start_date)) }}
                  
                    </p>
                  </td>
                  <td>
                    <p>Đến: 
                      {{ date(' H:i:s', strtotime($c->end_date)) }}<br>
                      {{ date('d-m-Y', strtotime($c->end_date)) }} 
                      </p>
                </td>
                  <td>
                    <span>
                      @if(($c->is_active)==1)
                      <button type="button" class="btn btn-success">Hoạt động</button>
                      @else
                      <button type="button" class="btn btn-danger"></button>                  
                    @endif
                    </span>
                  </td>
                  {{-- <td>{{$categories->$p->name}}</td> --}}
                  <td class="button">
                    <a style="color: cadetblue" href="/admin/coupon/restore/{{$c->id}}"><i class="fa-solid fa-trash-arrow-up"></i></a>
                    <a style="color: red" href="/admin/coupon/trashed/forceDelete/{{$c->id}}" onclick="return myFunction();"> <i onclick="myFunction()" class="fa-sharp fa-solid fa-trash"></i> </a>

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
     
            {{-- {{$coupons->appends(request()->all())->links()}}   --}}
         
      
        </ul>
      </nav>
  </div>
</div>
@endsection
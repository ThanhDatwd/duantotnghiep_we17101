@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content')

<div class="bg-light rounded h-100 p-4">
 <div class="text">
  <h2 class="">DANH SÁCH NGUỒN HÀNG </h2>

  <a href="/admin/brand/create"><i class="fa-solid fa-circle-plus"></i> Thêm nguồn hàng</a>
 </div>
  @if(Session::has('thongbao'))
    <div class="alert alert-success">
      {{Session::get('thongbao')}}
    </div>
  @endif
</a>
<a href="restore-all"  ><button type="button" class="btn btn-success m-2"><i class="fa fa-home me-2"></i>Khôi Phục Tất Cả</button>
</a>
<div class="table-responsive">
      <table class="table">
          <thead>
              <tr>
                  <th></th>
                  <th scope="col">ID</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Nơi nhập hàng</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($brands as $b)
              <tr>
                <th></th>
                  <th>{{$b->id}}</th>
                  <td><img src="{{asset('upload/'.$b->avatar)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" >
                  </td>
                  {{-- <td><img src="{{$p->thumb}}" alt=""></td> --}}

                  <td>{{$b->brands}}</td>
                  <td class="button">
                    <a style="color: cadetblue" href="/admin/brand/restore/{{$b->id}}"><i class="fa-solid fa-trash-arrow-up"></i></a>

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
@endsection
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
  <div class="table-responsive">
      <table class="table">
          <thead>
              <tr>
                  <th></th>
                  <th scope="col">ID</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Nguồn nhập hàng</th>
                  <th scope="col">Địa chỉ</th>
                  <th scope="col">Thông tin liên lạc</th>

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

                  <td>{{$b->address}}</td>
                  <td>
                    <p>Email: {{$b->email}}</p>
                    <p>Số điện thoại: {{$b->phone}}</p>
                  </td>

                  <td class="button">
                    <a style="color: cadetblue" href="/admin/brand/update/{{$b->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a style="color: orange" href="/admin/brand/delete/{{$b->id}}" onclick="return myFunction();"> <i onclick="myFunction()" class="fa-sharp fa-solid fa-trash"></i> </a>
                    {{-- <a style="color: red" href="/admin/brand/forceDelete/{{$b->id}}" onclick="return myFunction();"> <i onclick="myFunction()" class="fa-sharp fa-solid fa-trash"></i> </a> --}}

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
     
            {{$brands->appends(request()->all())->links()}}  
         
      
        </ul>
      </nav>
  </div>
</div>
@endsection
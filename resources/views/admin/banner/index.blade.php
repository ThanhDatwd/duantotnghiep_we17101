@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
 <style>
     .td-banner{
        position: relative;
        height: 240px;
        border: 2px dashed #0f9249;
     }
     .td-banner img{
        position: absolute;
        width: 100%
     }
     .td-banner .icon{
         display: inline;
         position: absolute;
         top: 16px;
         right: 16px;
     }
     .td-banner .icon i{
      font-size: 22px
     }
 </style>
@endsection
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('admin/banner/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="p-4">
    @if(Session::has('thongbao'))
    <div class="alert alert-success">
      {{Session::get('thongbao')}}
    </div>
    @endif
    <div class="text-start">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>Banner</div>
          <div class="adding">
            <a href="/admin/banner/them"><i class="fa-solid fa-circle-plus fs-3"></i></a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-start">
              <thead class="text-dark table-info">
                <tr>
                  <th scope="col">Hình ảnh</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($banner as $item)
                <tr>
                  <td >
                    <div class="position-relative td-banner" style=" height:240px">
                      <img  src="{{asset('upload/'.$item->url)}}" alt=""
                        onerror="this.src='{{asset('upload/error.jpg')}}'" class="position-absolute w-100 h-100 t-0 l-0">
                        <div class="icon">
                          <a style="color: red" href="{{url('admin/banner/xoa/'.$item->id)}}" onclick="return myFunction();">
                            <i class="bi bi-trash"></i> </a>
                        </div>

                    </div>
                  </td>
                  <script>
                    function myFunction() {
                        if(!confirm("Bạn có chắc chắn muốn xóa không!!"))
                        event.preventDefault();
                    }
                  </script>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
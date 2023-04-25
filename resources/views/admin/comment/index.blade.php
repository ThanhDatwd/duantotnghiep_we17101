@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('admin/comment/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
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
          <div>Danh sách bình luận</div>>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
            <thead class="text-dark table-info">
          <tr>
            <th></th>
            <th scope="col">Check</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Tên tài khoản</th>

            <th scope="col">Chỉnh sửa</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($comment as $item)
          <tr>
            <th></th>
            <td><input type="checkbox" name="check[]" value="{{$item->id}}"></td>
            <td>{{$item->content}}</td>
            <?php 
                $user = DB::table('users')->where('id',$item->user_id)->first();
                ?>
            <td>{{$user->name}}</td>
            <td class="button">
              <a style="color: red" href="{{url('admin/comment/xoa/'.$item->id)}}" onclick="return myFunction();"> <i
                  class="fa-sharp fa-solid fa-trash"></i> </a>
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
    {{$comment->appends(request()->all())->links()}}  
  </ul>
</nav>
</div>
</div>






</form>
@endsection
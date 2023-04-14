@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('admin/news/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="p-4">

    <div class="text-start">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>Danh sách tin tức</div>
          <div class="adding">
            <a href="/admin/news/them"><i class="fa-solid fa-circle-plus fs-3"></i></a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="text-dark table-info">
                <tr>
                  <th></th>
                  <th scope="col">Check</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Tiêu đề</th>
                  <th scope="col">Nội dung</th>
                  <th scope="col">Tác giả</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($news as $item)
                <tr>
                  <th></th>
                  <td><input type="checkbox" name="check[]" value="{{$item->id}}"></td>
                  <td><img style="width:60px,height:50px" src="{{asset('upload/'.$item->thumb)}}" alt=""
                      onerror="this.src='{{asset('upload/error.jpg')}}'">
                  </td>
                  {{-- <td><img src="{{$p->thumb}}" alt=""></td> --}}
                  <td>{{substr($item->title, 0, 50) }}</td>
                  <td>
  
                    {{ substr($item->summary, 0, 80) }}...
                  </td>
                  <td>
                    {{$item->created_by==null?'Quản trị viên':$item->created_by}}
                  </td>
                  {{-- <td>{{$categories->$p->name}}</td> --}}
                  <td class="">
                    <a style="color: cadetblue" href="{{url('admin/news/capnhat/'.$item->id)}}"><i
                        class="bi bi-pencil-square"></i></a>
                    <a style="color: red" href="{{url('admin/news/xoa/'.$item->id)}}" onclick="return myFunction();"> <i
                        class="bi bi-trash"></i> </a>
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
      <nav aria-label="Page navigation example">
        <ul class="pagination" style="display: flex;justify-content:space-between;">
          <li> {{$news->appends(request()->all())->links()}} </li>
          {{-- <li>
            <a href="{{url('admin/news/them')}}" class="btn btn-primary">Thêm</a>
  
            <a href="{{url('admin/news/thung-rac')}}" class="btn btn-primary">Thùng rác
              <?php
              $count = DB::table('news')->where('deleted_at','!=',null)->count();
            ?>
              ({{$count}})
            </a>
            <button type="submit" class="btn btn-danger">Xóa nhiều</button>
          </li> --}}
        </ul>
      </nav>
    </div>
  </div>
</form>
@endsection
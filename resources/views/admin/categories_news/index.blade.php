@extends('admin.appLayout.index')
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('admin/categories_news/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="p-4">
        <div class="text-start">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>Danh sách loại tin </div>
                    <div class="adding">
                        <a href="/admin/categories_news/them"><i class="fa-solid fa-circle-plus fs-3"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Check</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories_news as $item)
                                    <tr>
                                        <td><input type="checkbox" name="check[]" value="{{$item->id}}"></td>
                                        <td>{{$item->name}}</td>
                                        <td colspan="">
                                            <a href="{{url('admin/categories_news/capnhat/'.$item->id)}}"
                                                class="btn btn-primary">Sửa</a>
                                            <a href="{{url('admin/categories_news/xoa/'.$item->id)}}"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                                class="btn btn-danger">Xóa
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

</form>

@endsection
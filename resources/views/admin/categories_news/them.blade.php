@extends('admin.appLayout.index')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content')
<form action="/admin/categories_news/them" method="post" class="col-12 m-auto" enctype="multipart/form-data">
    <div class="adproduct">
            <div class="head" style="text-align: left;">
                <h2>THÊM LOẠI TIN TỨC</h2>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="boxlist1">
                            <div class="addpro">
                                <div class="adpro1">
                                    <p>Tên loại tin <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập tên loại tin" name="name">
                                    @error('title')
                                    <p>{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button class="btnmoi" type="submit">
                            THÊM MỚI</button>
                    </div>
                </div>

            </div>
        </div>
        @csrf
</form>
@endsection
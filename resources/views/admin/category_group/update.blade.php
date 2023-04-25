@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
<style>
    #btn-replaceImage,
    #btn-replaceImagePoster {
        display: block
    }

</style>
@endsection
@section('content')
<form action="/admin/category_group/update/{{$p->id}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="adproduct">

        <h2>CẬP NHẬT NHÓM LOẠI SẢN PHẨM</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-6 ">
                    <div class="boxlist1">
                        <div class="addpro">

                            <div class="adpro1">
                                <p>Tên loại sản phẩm <span>(*)</span></p>
                                <input type="text" name="name" value="{{$p->name}}"
                                    placeholder="Nhập nhóm loại sản phẩm">
                            </div>
                        </div>
                    </div>

                    <div class="addpro">
                        <div class="adpro1">
                            <p>Trạng thái</p>
                            <select name="is_active">
                                @if(($p->is_active)=='1')
                                <option value="1" selected>Hiện</option>
                                <option value="0">Ẩn</option>
                                @else
                                <option value="1">Hiện</option>
                                <option value="0" selected>Ẩn</option>

                                @endif
                            </select>

                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-sm-6 ">
                    <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
                    <div class="addpro">
                        <div class="adpro1">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <strong>Ảnh<span>(*)</span></strong>
                                <button class="btn btn-sm btn-light "  id="btn-replaceImage">Thay thế</button>
                            </div>
                            <div  id="cvas1">
                                @if ($p->thumb==null)
                                <div id="iconUpload">
                                    <i class="bi bi-upload"></i>
                                </div>
                                @endif
                                <img src="{{asset('upload/'.$p->thumb)}}" alt="">
                                <canvas id="imagePreviewUpload"></canvas>
                            </div>
                            <br>
                            <input name="thumb" hidden  value="{{asset('upload/')}}" type="file" id="image" multiple="false" accept="{{asset('upload/news.jpg')}}" onchange="uploadIm()"/><br>
                            <script>
                                var img = {{$p->thumb}};
                                const input = document.querySelector("input[type=file]");
                                input.value = img;
                            </script>
            
                        </div>
                    </div>
                    <div class="addpro">
                        <div class="adpro1">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <strong>Poster<span>(*)</span></strong>
                                <button class="btn btn-sm btn-light" id="btn-replaceImagePoster">Thay thế</button>
                            </div>
                            <div id="cvas1" class="poster">
                                @if ($p->poster==null)
                                    <div id="iconUploadPoster">
                                        <i class="bi bi-upload"></i>
                                    </div>
                                @endif
                                <img src="{{asset('upload/'.$p->poster)}}" alt=""  >
                                <canvas id="imagePreviewUploadPoster"></canvas>
                            </div>
                            <input class="thumbs" hidden name="poster" type="file" id="poster" multiple="false"
                                accept="image/*" onchange="uploadImP()" /><br>
                            @error('thumb')
                            <span class="badge badge-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="ci"><button type="submit" class="btnmoi">Thêm mới</button>
                    <a href="/admin/category_group">Hủy</a>
                </div>
            </div>
        </div>
    </div>

    </div>



    </div>
</form>
<script>
    window.CP.PenTimer.MAX_TIME_IN_LOOP_WO_EXIT = 6000;
    var drawGray = null;
    function uploadIm(){
        let canvas = document.getElementById("imagePreviewUpload");
        let image = document.getElementById("image");
        let draw = new SimpleImage(image);
        drawGray = new SimpleImage(image);
        draw.drawTo(canvas);
        $("#iconUpload").hide(100)
        $("#btn-replaceImage").show(100)
    }
    var drawGrayP = null;
    function uploadImP(){
        let canvas = document.getElementById("imagePreviewUploadPoster");
        let image = document.getElementById("poster");
        let drawp = new SimpleImage(image);
        drawGrayP = new SimpleImage(image);
        drawp.drawTo(canvas);
        $("#iconUploadPoster").hide(100)
        $("#btn-replaceImagePoster").show(100)
    }
</script>
<script>

    $("#btn-replaceImage").click(function (e) { 
        e.preventDefault();
        $("#image").click()
    });
    $("#iconUpload").click(function (e) { 
        e.preventDefault();
        $("#image").click()
    });
    $("#btn-replaceImagePoster").click(function (e) { 
        e.preventDefault();
        $("#poster").click()
    });
    $("#iconUploadPoster").click(function (e) { 
        e.preventDefault();
        $("#poster").click()
    });
</script>

@endsection
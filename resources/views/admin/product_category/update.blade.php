@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
<style>
    #cvas1 {
        width: 100%;
        aspect-ratio: 1/1;
        position: relative;
    }

    #cvas1 #iconUpload {
        width: 100%;
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    #imagePreviewUpload {
        width: 100%;
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
    }

    #cvas1 #iconUpload.active {
        display: flex;
    }

    #cvas1 #iconUpload i {
        z-index: 1000;
        font-size: 40px;
        font-weight: 900;
    }

    #cvas1 img {
        width: 100%;
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
    }
</style>
@endsection
@section('content')

<form action="/admin/product_category/update/{{$p->id}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="adproduct">

        <h2>CẬP NHẬT LOẠI SẢN PHẨM</h2>

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
                                <input type="text" name="category_name" value="{{$p->category_name}}"
                                    placeholder="Nhập loại sản phẩm">
                            </div>
                        </div>
                    </div>
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Nhóm loại sản phẩm</p>
                            <select name="category_group_id">

                                @foreach ($categroup as $cg)

                                <option value="{{$cg->id}}">{{$cg->name}}</option>
                                @endforeach

                            </select>

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
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Vị trí hiện</p>
                            <select name="stt">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
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
                                @if ($p->thumb!=null)
                                <button class="btn btn-sm btn-light " id="btn-replaceImage">Thay thế</button>
                                @endif
                            </div>
                            <div id="cvas1">
                                @if ($p->thumb==null)
                                <div id="iconUpload">
                                    <i class="bi bi-upload"></i>
                                </div>
                                @endif
                                <img src="{{asset('upload/'.$p->thumb)}}" alt=""
                                    onerror="this.src='{{asset('upload/error.jpg')}}'">
                                <canvas id="imagePreviewUpload"></canvas>
                            </div>
                            <br>
                            <input name="thumb" hidden value="{{asset('upload/')}}" type="file" id="image"
                                multiple="false" accept="{{asset('upload/news.jpg')}}" onchange="uploadIm()" /><br>
                            <script>
                                var img = {{$p->thumb}};
                                const input = document.querySelector("input[type=file]");
                                input.value = img;
                            </script>
                        </div>
                    </div>
                </div>
                <div class="ci"><button type="submit" class="btnmoi">Cập nhật</button>
                    <a href="/admin/product_category">Hủy</a>
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
        var canvas = document.getElementById("imagePreviewUpload");
        var image = document.getElementById("image");
        var draw = new SimpleImage(image);
        drawGray = new SimpleImage(image);
        $("#iconUpload").hide(100)
        draw.drawTo(canvas);
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
</script>

@endsection
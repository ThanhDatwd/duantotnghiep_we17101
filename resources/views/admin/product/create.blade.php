@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content')

{{-- <a href="/admin/product"><button>danh sách</button></a> --}}

<form action="/admin/product/create" enctype="multipart/form-data" method="post">
    @csrf
    <div class="adproduct">
        <h2>THÊM SẢN PHẨM</h2>
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-6 ">
                    <div class="boxlist1">
                        <div class="addpro">
                            <div class="adpro1">
                                <p>Tên sản phẩm <span>(*)</span></p>
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Nhập tên sản phẩm">
                                @error('name')
                                <span class="badge badge-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="addpro">
                            <div class="adpro1">
                                <p>Loại sản phẩm <span>(*)</span></p>
                                <select name="category_id">
                                    @foreach($categories as $c)
                                    <option value="{{$c->id}}">{{$c->category_name}}</option>

                                    @endforeach

                                </select>
                                @error('category_id')
                                <span class="badge badge-danger">{{ $message }}</span> @enderror


                            </div>


                        </div>
                        <div class="addpro">
                            <div class="adpro1" >
                                <p>Đơn vị <span>(*)</span></p>
                                <select name="unit">
                                    <option value="kg">Kg</option>
                                    <option value="tấn">Tấn</option>
                                    <option value="tạ">Tạ</option>
    
                                </select>
                            </div>
                            <div class="adpro1">
                                <p>Giá bán <span>(*)</span></p>
                                <input type="number" name="price_current" value="{{old('price_current')}}"
                                    placeholder="Nhập giá bán">
                                @error('price_current')
                                <span class="badge badge-danger">{{ $message }}</span> @enderror

                            </div>
                            <div class="adpro1">
                                <p>Giảm giá</p>
                                <input type="number" style="width:100%" name="discount" value="{{old('discount')}}"
                                    min="0" max="100" placeholder="Nhập giảm giá">
                                @error('discount')
                                <span class="badge badge-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="addpro">
                            <div class="adpro1" >
                                <p>Nguồn hàng</p>
                                <select name="brand">
                                    @foreach($brands as $b)
                                    <option value="{{$b->brands}}">{{$b->brands}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="addpro">
                            <div class="adpro1">
                                <p>Mô tả ngắn <span>(*)</span></p>
                                <textarea name="summary" id="" style="width:100%" cols="100" rows="5"></textarea>
                                @error('summary')
                                <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="addpro">
                            <div class="adpro1">
                                <p>Trạng thái</p>
                                <select name="is_active">
                                    <option value="1">Còn hàng</option>
                                    <option value="0">Hết hàng</option>
                                </select>

                            </div>
                        </div>

                        <div class="addpro">
                            <div class="adpro1">
                                <script type="text/javascript"
                                    src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
                                <p>Mô tả <span>(*)</span></p>
                                <textarea id="editor1" name="content"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 ">
                    <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
                    <div class="addpro" >
                        <div class="adpro1">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <strong>Ảnh<span>(*)</span></strong>
                                <button class="btn btn-sm btn-light" id="btn-replaceImage">Thay thế</button>
                            </div>
                            <div id="cvas1">
                                <div id="iconUpload">
                                    <i class="bi bi-upload"></i>
                                </div>
                                <canvas id="imagePreviewUpload"></canvas>
                            </div>
                            <input class="thumbs" hidden name="thumb" type="file" id="image" multiple="false"
                                accept="image/*" onchange="uploadIm()" /><br>
                            @error('thumb')
                            <span class="badge badge-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    {{-- <div class="addpro" >
                        <div class="adpro1">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <strong>Bộ sưu tập</strong>
                                <button class="btn btn-sm btn-light" id="btn-replaceImage">Thay thế</button>
                            </div>
                            <input type="file" multiple id="file-input" onchange="handleFiles()">
                            <div id="image-preview">
                                
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="ci">
                <button type="submit" class="btnmoi">Thêm mới</button>
                <a href="/admin/product">Hủy</a>
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
        draw.drawTo(canvas);
        $("#iconUpload").hide(100)
        $("#btn-replaceImage").show(100)
    }
</script>
<script>
    var editor = CKEDITOR.replace( 'editor1' );

    // The "change" event is fired whenever a change is made in the editor.
    editor.on('change', function( evt ) {
        $('#hiddedn input').val(evt.editor.getData());
       
    });
    $("#btn-replaceImage").click(function (e) { 
        e.preventDefault();
        $("#image").click()
    });
    $("#iconUpload").click(function (e) { 
        e.preventDefault();
        $("#image").click()
    });


//     function handleFiles() {
//   const fileList = document.getElementById("file-input").files;
//   const previewContainer = document.getElementById("image-preview");

//   for (let i = 0; i < fileList.length; i++) {
//     const file = fileList[i];

//     const reader = new FileReader();
//     reader.readAsDataURL(file);

//     reader.onloadend = function () {
//       const previewImage = document.createElement("img");
//       previewImage.src = reader.result;
//       previewContainer.appendChild(previewImage);
//     };
//   }
// }
</script>
@endsection
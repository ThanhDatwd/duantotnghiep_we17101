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
{{-- <a href="/admin/product"><button>danh sách</button></a> --}}
<form action="/admin/product/update/{{$p->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="adproduct">

        <h2>CẬP NHẬT SẢN PHẨM</h2>
        
        <div class= "container-fluid">
            <div class= "row">
               <div class ="col-md-8 col-sm-6 ">
                <div class="boxlist1">
                    <div class="addpro">
                       
                        <div class="adpro1">
                            <p>Tên sản phẩm <span>(*)</span></p>
                            <input type="text" value="{{$p->name}}" name="name" placeholder="Nhập tên sản phẩm">
                        </div>
                     
                
                    </div>
                    <div class="addpro">        
                        <div class="adpro1">
                            <p>Loại sản phẩm <span>(*)</span></p>
                            <select name="category_id">
                                @foreach($categories as $c)
                                @if ($p->category_id==$c->id)
                                <option selected value="{{$c->id}}">{{$c->category_name}}</option>
                                @else
                                <option value="{{$c->id}}">{{$c->category_name}}</option>

                                @endif
                                @endforeach
                            </select>
                        </div>
                     
                
                    </div>
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Giá <span>(*)</span></p>
                            <input type="number" value="{{$p->price}}"  name="price" placeholder="Nhập giá bán">
                        </div>
                        
                        <div class="adpro1">
                            <p>Giá bán <span>(*)</span></p>
                            <input type="number" name="price_current" value="{{$p->price_current}}" placeholder="Nhập giá bán">
                        </div>
                        <div class="adpro1">
                            <p>Giảm giá</p>
                            <input type="number" name="discount" min="0" max="100" value="{{$p->discount}}" placeholder="Nhập giá bán">
                        </div>   
                    </div>
                <div class="addpro">
                   <div class="adpro1" style="width:200px">
                       <p>Xuất xứ</p>
                       <select name="brand"> 
                     @foreach($brands as $b)
                     @if ($p->brand == $b->brands)
                     <option selected value="{{$b->brands}}">{{$b->brands}}</option>
                     @else   
                      <option value="{{$b->brands}}">{{$b->brands}}</option>
                     @endif
                        @endforeach
                       
                       
                       </select>
                   </div>
                 
                   <div class="adpro1" style="width:200px">
                    <p>Đơn vị <span>(*)</span></p>
                    <select name="unit">
                        <option value="{{$p->unit}}"><p>{{$p->unit}}</p></option>
                        <option value="kg">Kg</option>
                        <option value="tấn">Tấn</option>
                        <option value="tạ">Tạ</option>
                
                    </select>
                </div>
                  
                </div>
                
                
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Mô tả ngắn <span>(*)</span></p>
                            <textarea name="summary" id="" style="width:100%" cols="100" rows="5">{{$p->summary}}</textarea>
                        </div>
                    </div>
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Trạng thái</p>
                            <select name="is_active">
                                @if(($p->is_active)=='1')
                                <option value="1" selected >Còn hàng</option>
                                <option value="0" >Hết hàng</option>
                                @else
                                <option value="1" >Còn hàng</option>
                                <option value="0" selected>Hết hàng</option>   

                                @endif
                               
                            </select>
                        </span>
                
                        </div>
                    </div>
                
                    <div class="addpro">
                        <div class="adpro1">
                         
                                <script type="text/javascript" src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
                                <p>Mô tả <span>(*)</span></p>
                                <textarea id="editor1" name="content">{{$p->content}}</textarea>            
                                              </div>
                       </div>
                </div>
                
                
               </div>
               <div class ="col-md-4 col-sm-6 ">
        <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
        <div class="addpro" >
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
                    <img src="{{asset('upload/'.$p->thumb)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'">
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
            
        </div>
               </div>
               <div class="ci">
                   <button type="submit" class="btnmoi">Cập nhật</button>
                  <a href="/admin/product">Hủy</a>
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
    var editor = CKEDITOR.replace( 'editor1' );

// The "change" event is fired whenever a change is made in the editor.
editor.on( 'change', function( evt ) {
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
</script>
@endsection
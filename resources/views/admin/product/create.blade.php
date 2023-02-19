@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
@endsection
@section('content')

<a href="/admin/product"><button>danh sách</button></a>

<form action="/admin/product/create" enctype="multipart/form-data" method="post">
    @csrf
    <div class="adproduct">

        <h2>Thêm sản phẩm</h2>
        
        
        <div class= "container-fluid">
            <div class= "row">
               <div class ="col-md-8 col-sm-6 ">
                <div class="boxlist1">
                    <div class="addpro">
                       
                        <div class="adpro1">
                            <p>Tên sản phẩm <span>(*)</span></p>
                            <input type="text" name="name" placeholder="Nhập tên sản phẩm">
                        </div>
                     
                
                    </div>
                    <div class="addpro">        
                        <div class="adpro1">
                            <p>Loại sản phẩm <span>(*)</span></p>
                            <select name="category_id">
                                <option value="1">Không</option>
                                <option value="2">2</option>
                                <option value="3">2</option>
                            </select>
                        </div>
                     
                
                    </div>
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Giá<span>(*)</span></p>
                            <input type="number" name="price" value="{{old('price')}}" placeholder="Nhập giá ">
                        </div>
                        
                        <div class="adpro1">
                            <p>Giá bán <span>(*)</span></p>
                            <input type="number" name="price_current" value="{{old('price_current')}}" placeholder="Nhập giá bán">
                        </div>
                        <div class="adpro1">
                            <p>Giảm giá</p>
                            <input type="number" name="discount" value="{{old('discount')}}"  min="0" max="100" placeholder="Nhập giá bán">
                        </div>
                        {{-- <div class="adpro1">
                            <p>Tình trạng <span>(*)</span></p>
                            <select>
                                <option value="">Còn hàng</option>
                                <option value="">2</option>
                                <option value="">2</option>
                
                            </select>
                        </div> --}}
                        
                    </div>
                <div class="addpro">
                   <div class="adpro1" style="width:200px">
                       <p>Xuất xứ</p>
                       <select name="brand">
                       <option value="">fsd</option>                         
                       </select>
                   </div>
                 
                   <div class="adpro1" style="width:200px">
                    <p>Đơn vị <span>(*)</span></p>
                    <select name="unit">
                        <option value="*">Chọn quy cách</option>
                        <option value="kg">Kg</option>
                        <option value="tấn">Tấn</option>
                        <option value="tạ">Tạ</option>
                
                    </select>
                </div>
                  
                </div>
                
                
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Mô tả ngắn <span>(*)</span></p>
                            <textarea name="summary" id="" style="width:100%" cols="100" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Thuộc tính</p>
                            <button class="btnThuoc">Thêm thuộc tính</button>
                
                        </div>
                    </div>
                
                    <div class="addpro">
                        <div class="adpro1">
                         
                                <script type="text/javascript" src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
                                <p>Mô tả <span>(*)</span></p>
                                <textarea id="editor1" name="content"></textarea>            
                                              </div>
                       </div>
                </div>
                
                
                
                
               </div>
               <div class ="col-md-4 col-sm-6 ">
        <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
        <div class="addpro" style="margin:0 25px">
            <div class="adpro1">
                <p>Ảnh<span>(*)</span></p>
                <canvas  id="cvas1"></canvas>
                <br>
                <!--<input type="text" id="textinput"/>--
                <input type="button" id="btn" value="carrega" onclick="upload()"/>-->
                <input name="thumb" type="file" id="image" multiple="false" accept="image/*" onchange="uploadIm()"/><br>
        
                <button type="submit" class="btnmoi">THÊM MỚi</button>
            </div>
        </div>
            
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
var canvas = document.getElementById("cvas1");
var image = document.getElementById("image");
var draw = new SimpleImage(image);
drawGray = new SimpleImage(image);
draw.drawTo(canvas);
}
</script>
<script>
    var editor = CKEDITOR.replace( 'editor1' );

// The "change" event is fired whenever a change is made in the editor.
editor.on( 'change', function( evt ) {
    // getData() returns CKEditor's HTML content.
  console.log( 'This is what you typed ' + evt.editor.getData() + typeof evt.editor.getData() );
    console.log( 'Total bytes: ' + evt.editor.getData().length );
  $('#hiddedn input').val(evt.editor.getData());
});
</script>
@endsection
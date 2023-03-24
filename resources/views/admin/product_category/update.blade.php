@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
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
        <div class= "container-fluid">
            <div class= "row">
               <div class ="col-md-8 col-sm-6 ">
                <div class="boxlist1">
                    <div class="addpro">
                       
                        <div class="adpro1">
                            <p>Tên loại sản phẩm <span>(*)</span></p>
                            <input type="text" name="category_name" value="{{$p->category_name}}" placeholder="Nhập loại sản phẩm">
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
                            <option value="1" selected >Hiện</option>
                            <option value="0" >Ẩn</option>
                            @else
                            <option value="1" >Hiện</option>
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
var canvas = document.getElementById("cvas1");
var image = document.getElementById("image");
var draw = new SimpleImage(image);
drawGray = new SimpleImage(image);
draw.drawTo(canvas);
}
</script>

@endsection
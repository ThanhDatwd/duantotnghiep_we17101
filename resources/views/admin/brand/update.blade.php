@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
@endsection
@section('content')

{{-- <a href="/admin/product_category"><button>danh sách</button></a> --}}

<form action="/admin/brand/update/{{$b->id}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="adproduct">

        <h2>CẬP NHẬT NGUỒN NHẬP HÀNG</h2>
        
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
                    
                    {{-- <div class="addpro">    
                        <div class="adpro1">
                            
                            <p>Tên người nhập hàng <span>(*)</span></p>
                            <input type="text" name="importer" value="{{$b->importer}}" placeholder="Nhập người nhập hàng">
                        </div>
                    </div> --}}
                    {{-- <div class="addpro">    
                        <div class="adpro1">
                            <p>Email<span>(*)</span></p>
                            <input type="email" name="" value="" placeholder="Nhập email người nhận">
                        </div>
                        <div class="adpro1">
                            <p>Số điện thoại <span>(*)</span></p>
                            <input type="number" name="" value=""  placeholder="Nhập số điện thoại người nhận">
                        </div>
                    </div> --}}

                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Tên nguồn nhập hàng <span>(*)</span></p>
                            <input type="text" name="brands" value="{{$b->brands}}" placeholder="Nhập nguồn hàng">
                        </div>
                    </div>
                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Email<span>(*)</span></p>
                            <input type="email" name="email" value="{{$b->email}}" placeholder="Nhập email nguồn hàng">
                        </div>
                        <div class="adpro1">
                            <p>Số điện thoại <span>(*)</span></p>
                            <input type="number" name="phone" value="{{$b->phone}}"  placeholder="Nhập sdt nguồn hàng">
                        </div>
                    </div>
            
                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Địa chỉ<span>(*)</span></p>
                            <input type="text" name="address" value="{{$b->address}}" placeholder="Nhập địa chỉ">
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
                <input name="avatar" type="file" id="image" multiple="false" accept="image/*" onchange="uploadIm()"/><br>
        
            </div>
        </div>
        
    </div>
    <div class="ci"><button type="submit" class="btnmoi">Thêm mới</button>
        <a href="/admin/brand">Hủy</a>
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
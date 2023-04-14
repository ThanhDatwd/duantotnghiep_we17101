@extends('admin.appLayout.index')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
@endsection
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="/admin/admin_users/them" method="post" class="col-12 m-auto" enctype="multipart/form-data">
<div class="adproduct">
{{-- <div class="direct-header">
        <div class="direct">
        <a href="/admin">Trang chủ</a>
        <span>></span>
        <a href="/admin/news">Tin tức</a>
        <span>></span>
        <a href="/admin/news/them">Thêm tin tức</a>
    </div> --}}
<div class="head" style="text-align: left;">
    <h2>THÊM ADMIN</h2>
</div>
{{-- <div class="span">
   <input type="hidden">
</div>
<div class="span">
   <input type="hidden">
</div> --}}

<div class= "container-fluid" style="Width: 100%;">
    <div class= "row">
        <div class ="col-md-9 ">
            <div id="exTab1" class="container">
                <div class="tab-content clearfix">
                    <div class="tab-pane boxlist active" id="1a">
                        <div class="boxlist1">
                            <div class="addpro">
                               
                                <div class="adpro1">
                                    <p>Tên Username <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập tên tiêu đề" name="username">
                                    @error('title')
                                   <p>{{$message}}</p>
                                    @enderror
                                    
                                </div>

                                       <div class="adpro1">
                                    <p>Giới tính <span>(*)</span></p>
  <label>
    <input type="radio" name="gender" value="1"  checked>
    Nam
  </label>
  <label>
    <input type="radio" name="gender" value="2">
    Nữ
  </label>
</div>
                                     
                
                          </div>  
                            <div class="addpro">                         
                                <div class="adpro1">
                                    <p>Mật khẩu <span>(*)</span></p>
                                    <input type="password" placeholder="Nhập mật khẩu" name="password" style="height:45px; width: 100%; border-radius: 5px; border: 1px solid darkgrey;">
                                   
                                    
                                   </div>
                                      <div class="adpro1">
                                        <p>Nhập lại mật khẩu <span>(*)</span></p>
                                        <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirmation" style="height:45px; width: 100%; border-radius: 5px; border: 1px solid darkgrey;">
                                      </div>
                                   
                             </div>
                                                  <div class="addpro">
                                                    
      


                          </div>
                          <div class="addpro">
                             <div class="adpro1">
                                    <p>Email <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập tên tiêu đề" name="email">
                                  
                                    
                                </div>
                            <div class="adpro1">
                                    <p>Ngày sinh <span>(*)</span></p>
                                    <input type="date"  placeholder="Nhập ngày sinh" name="birthday" style="height:45px; width: 100%; border-radius: 5px; border: 1px solid darkgrey;">
                            </div>
                          </div>
                              <div class="addpro">
                               
                                <div class="adpro1">
                                    <p>Họ <span>(*)</span></p>
                                    <input type="text" placeholder="Họ" name="last_name">
                               
                                    
                                </div>
                                 <div class="adpro1">
                                    <p>Tên <span>(*)</span></p>
                                    <input type="text" placeholder="Tên" name="first_name">
                               
                                    
                                </div>
                             
                            </div><div class="addpro">
                               
                                <div class="adpro1">
                                    <p>Quê quán <span>(*)</span></p>
                                 <select name="province" id="city_id">
                                    <option value="">Chọn tỉnh thành</option>
                                     <option value="1">Hà Nội</option>
                                      <option value="2">Hồ Chí Minh</option>
                                    </select>
                                    
                                </div>
                             </div>

                        
                              <div class="addpro">
                               
                                <div class="adpro1">
                                    <p>Quận <span>(*)</span></p>
                                <select name="ward" id="city_id">
                                    <option value="">Chọn phường</option>
                                     <option value="1">1</option>
                                      <option value="2">2</option>

                                </select>
                               
                                    
                                </div>
                                 <div class="adpro1">
                                    <p>Quận <span>(*)</span></p>
                                    <select name="district" id="district_id">
                                    <option value="">Chọn quận huyện</option>
                                     <option value="1">Hà Nội</option>
                                      <option value="2">Hồ Chí Minh</option>
                                    </select>
                               
                                    
                                </div>
                             
                            </div>
                             <div class="addpro">
                               
                                <div class="adpro1">
                                    <p>Địa chỉ <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập địa chỉ" name="address">
                                  
                                    
                                </div>
                          </div>
                           <div class="addpro">
                               
                                <div class="adpro1">
                                    <p>Số điện thoại <span>(*)</span></p>
                                    <input type="number" placeholder="Nhập số điện thoại" name="phone">
                                   
                                    
                                </div>
                          </div>



                           
                           <div class="addpro">
                                <div class="adpro1">
                                    <p>Kích hoạt <span>(*)</span></p>
                                    <select name="is_active">
                                   <option value="1">Hoạt động</option>
                                      <option value="2">Ẩn</option>
                                    </select>
                                  
                                    
                                </div>
                                
                            
                              
                             
                            </div>
                    
                        </div>
                        <div class="boxlist2">
                            <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
                        </div>
                    </div>
                    <div class="tab-pane" id="2a">
                        <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
                    </div>
                    <div class="tab-pane" id="3a">
                        <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
                    </div>
                    <div class="tab-pane" id="4a">
                        <h3>We use css to change the background color of the content to be equal to the tab</h3>
                    </div>
                </div>
            </div>

        </div>

        <div class ="col-md-3">
  
            <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>

            <div class="addpro">
                <div class="adpro1">
                    <p>Ảnh đại diện <span>(*)</span></p>
                    <canvas id="cvas1"></canvas>
                    <br>
                    <!--<input type="text" id="textinput"/>--
                    <input type="button" id="btn" value="carrega" onclick="upload()"/>-->
                    <input type="file" name="avatar" id="image" multiple="false" accept="image/*" onchange="uploadIm()"/><br>
                    
            
                </div>
            </div>
            <div class="addpro">
               
            </div>
            <button class="btnmoi" type="submit">
                THÊM MỚI</button>
                
            </div>
        </div>
    </div>
 
</div>
@csrf
</div>
 </form>  
</div>
 <script type="text/javascript" src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

@endsection
@extends('admin.appLayout.index')
@section("css")
@endsection
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script type="text/javascript" src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<style>
.adproduct {
    padding:50px;
}

#exTab1 .tab-content {
/*color : white;*/
width: 100%;
/*background-color: #428bca;*/
padding : 5px 15px;
}

#exTab2 h3 {
color : white;
background-color: #428bca;
padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
color : white;
padding : 5px 15px;
}
/* //================================== */
.addpro{

display: flex;

}
.addpro .adpro1 {
margin-right: 11px;
margin-top:10px;
width: 100%;
float: left;
}
.addpro .adpro1 p{
font-weight: bold;
}
.adpro1 input[type=text], .adpro1 select {
height: 45px;
width: 100%;

border-radius: 5px;
border: 1px solid darkgrey
}
.adpro1 input[type=text]{
padding: 20px;

}
.adpro1 select {



}
.addpro .adpro1 span{
color: red;
}
.listnav li {
background: #428bca;
color: #fff;
margin-right:5px;
padding:10px

}
.listnav li a{
color: #fff;
text-decoration: none
}
.listnav li:hover{
background: orange
}


#cvas1{
width: 300px;
height: 150px;
border: 1px solid black;
}
.btnThuoc {
padding :10px;
background: #428bca;
color: #fff;
border: none;
border-radius: 10px
}
.btnmoi {
margin: 20px 0;
padding :10px;
background: #428bca;
color: #fff;
border: none;
border-radius: 10px

}
.boxlist{

}

</style>
<div class="adproduct">

<h2>Thêm sản phẩm</h2>

<div class= "container-fluid">
    <div class= "row">
        <div class ="col-md-9 ">
            <div id="exTab1" class="container">
                {{-- <ul  class="nav listnav">
                    <li class="active">
                        <a  href="#1a" data-toggle="tab">Chung</a>
                    </li>
                    <li><a href="#2a" data-toggle="tab">Thiết kế</a>
                    </li>
                    <li><a href="#3a" data-toggle="tab">Sản phẩm</a>
                    </li>
                    <li><a href="#4a" data-toggle="tab">Background color</a>
                    </li>
                </ul> --}}
                

                <div class="tab-content clearfix">
                    <div class="tab-pane boxlist active" id="1a">
                        <div class="boxlist1">
                            <div class="addpro">
                                <div class="adpro1">
                                    <p>Mã sản phẩm <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập mã sản phẩm">
                                </div>
                                <div class="adpro1">
                                    <p>Tên sản phẩm <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="adpro1">
                                    <p>Giá bán <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập giá bán">
                                </div>

                            </div>
                            <div class="addpro">
                                <div class="adpro1">
                                    <p>Đơn vị <span>(*)</span></p>
                                    <select>
                                        <option value="">Chọn đơn vị</option>
                                        <option value="">2</option>
                                        <option value="">2</option>

                                    </select>
                                </div>
                                
                                <div class="adpro1">
                                    <p>% Thuế GTGT <span>(*)</span></p>
                                    <select>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">2</option>

                                    </select>
                                </div>
                                <div class="adpro1">
                                    <p>Tình trạng <span>(*)</span></p>
                                    <select>
                                        <option value="">Còn hàng</option>
                                        <option value="">2</option>
                                        <option value="">2</option>

                                    </select>
                                </div>
                                <div class="adpro1">
                                    <p>Nổi bật <span>(*)</span></p>
                                    <select>
                                        <option value="">Không</option>
                                        <option value="">2</option>
                                        <option value="">2</option>

                                    </select>
                                </div>
                            </div>
                       <div class="addpro">
                           <div class="adpro1">
                               <p>Loại sản phẩm</p>
                               <select>
                                   <option value="">Không</option>
                                   <option value="">2</option>
                                   <option value="">2</option>
                               </select>
                           </div>
                           <div class="adpro1">
                               <p>Lắp đặt</p>
                               <select>
                                   <option value="">Không</option>
                                   <option value="">2</option>
                                   <option value="">2</option>
                               </select>
                           </div>
                           <div class="adpro1">
                            <p>Quy cách <span>(*)</span></p>
                            <select>
                                <option value="">CHọn quy cách</option>
                                <option value="">2</option>
                                <option value="">2</option>

                            </select>
                        </div>
                           <div class="adpro1">
                               <p>Cho phép đổi điểm</p>
                               <select>
                                   <option value="">Không</option>
                                   <option value="">2</option>
                                   <option value="">2</option>
                               </select>
                           </div>
                       </div>
                       

                            <div class="addpro">
                                <div class="adpro1">
                                    <p>Mô tả ngắn <span>(*)</span></p>
                                    <textarea name="" id="" style="width:100%" cols="100" rows="5"></textarea>

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
                                    <p>Mô tả <span>(*)</span></p>
                                        <textarea id="editor1" name="editor1" style="width:100%"></textarea>
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
                    <input type="file" id="image" multiple="false" accept="image/*" onchange="uploadIm()"/><br>
            
                </div>
            </div>
            <button class="btnmoi">THÊM MỚi</button>
                
            </div>
        </div>
    </div>

</div>


</div>
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
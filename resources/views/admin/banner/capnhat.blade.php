@extends('admin.appLayout.index')
@section('content')
<?php

use Illuminate\Support\Facades\DB;

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/admin/product.css')}}">
    @yield('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script type="text/javascript" src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<style>

</style>
<div class="adproduct">


<form action="/admin/news/capnhat/{{$t->id}}" method="post" enctype="multipart/form-data"><div class= "container-fluid">
    @csrf
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
                                    <p>Tiêu đề <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập tên tiêu đề" name="title" value="{{$t->title}}">
                                </div>
                             
                            </div>
                            <div class="addpro">
                                <div class="adpro1">
                                    <p>Thể loại <span>(*)</span></p>
                                    <select name="category_news_id">
                                        <option value="">Chọn thể loại</option>

                                        <?php
            $categories = DB::table('categories_news')->get();
            foreach($categories as $cate){
                if($cate->id == $t->category_news_id){
                    echo "<option value='$cate->id' selected>$cate->name</option>";
                }else{
                    echo "<option value='$cate->id'>$cate->name</option>";
                }
            }
            ?>
                                    </select>
                                </div>
                                
                            
                              
                             
                            </div>
                      
                       

                            <div class="addpro">
                                <div class="adpro1">
                                      <p>Tóm tắt <span>(*)</span></p>
                                    <textarea name="summary" id="" style="width:100%" cols="100" rows="5" name="summary">
                                </textarea>

                                </div>
                            </div>
                          

                            <div class="addpro">
                                <div class="adpro1">
                                    <p>Nội dung bài viết  <span>(*)</span></p>
                                        <textarea id="editor1"  style="width:100%"  name="content">
                                    </textarea>
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
                    
                    <canvas id="cvas1">
                      
                    </canvas>
                    <br>
                    <!--<input type="text" id="textinput"/>--
                    <input type="button" id="btn" value="carrega" onclick="upload()"/>-->
                    <input type="file" name="thumb" id="image" multiple="false" accept="image/*" onchange="uploadIm()" >
            
                </div>
            </div>
            <button class="btnmoi" type="submit">
                THÊM MỚI</button>
                
            </div>
        </div>
    </div>
 
</div>
@csrf
 </form>  
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
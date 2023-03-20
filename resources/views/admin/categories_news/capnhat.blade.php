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


<form action="/admin/categories_news/capnhat/{{$t->id}}" method="post" class="col-7 m-auto">
<div class="adproduct">

<div class="head" style="text-align: left;">
    <h2>CẬP NHẬT LOẠI TIN TỨC</h2>
</div>
<div class= "container-fluid">
    <div class= "row">
        <div class ="col-md-12 ">
            
                        <div class="boxlist1">
                            <div class="addpro">
                               
                                <div class="adpro1">
                                    <p>Tên loại tin <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập tên loại tin" name="name" value="{{old('name') ?? $t->name}}"/>
                                  
                                    
                                </div>
                             
                            </div>
                         
                            </div>                     
            

        </div>
        <div class ="col-md-3"> 
            <button class="btnmoi" type="submit">
                Sửa lại</button>
                
            
        </div>
    </div>
 
</div>
</div>

@csrf
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

@endsection
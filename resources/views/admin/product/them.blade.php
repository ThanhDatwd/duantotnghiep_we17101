<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/admin/product.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

<h2>Thêm sản phẩm</h2>

<div class= "container-fluid">
    <div class= "row">
       <div class ="col-md-7 ">
         
         <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Chung')">Chung</button>
            <button class="tablinks" onclick="openCity(event, 'mota')">Mô tả</button>
            <button class="tablinks" onclick="openCity(event, 'dulieu')">Dữ liệu</button>
           </div>
           
           <div id="Chung" class="tabcontent">
            {{-- <h3>London</h3> --}}
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
                    <p>Quy cách <span>(*)</span></p>
                    <select>
                        <option value="">CHọn quy cách</option>
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
                    <p>Mô tả <span>(*)</span></p>
                    <input type="text">
                </div>
            </div>


           </div>
           
           <div id="mota" class="tabcontent">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p> 
           </div>
           
           <div id="dulieu" class="tabcontent">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
           </div>
         
       </div>
       
       <div class ="col-md-5 bg-success">
          <p>col-md-7</p>
       </div>
    </div>
 </div>



<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 

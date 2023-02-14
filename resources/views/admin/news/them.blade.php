<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/admin/product.css')}}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
@extends('admin.layout.index')
<body>
<style>
    .adproduct {
        padding:50px;
    }

</style>
<div class="adproduct">

    <h2>Thêm sản phẩm</h2>

    <div class= "container-fluid">
        <div class= "row">
            <div class ="col-md-7 ">


                <div class="container"><h1>Bootstrap  tab panel example (using nav-pills)  </h1></div>
                <div id="exTab1" class="container">
                    <ul  class="nav nav-pills">
                        <li class="active">
                            <a  href="#1a" data-toggle="tab">Overview</a>
                        </li>
                        <li><a href="#2a" data-toggle="tab">Using nav-pills</a>
                        </li>
                        <li><a href="#3a" data-toggle="tab">Applying clearfix</a>
                        </li>
                        <li><a href="#4a" data-toggle="tab">Background color</a>
                        </li>
                    </ul>

                    <div class="tab-content clearfix">
                        <div class="tab-pane active" id="1a">

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
        <input type="text">

    </div>
</div>
                            <div class="addpro">
                                <div class="adpro1">
                                    <p>Thuộc tính</p>
                                    <button>Thêm thuộc tính</button>

                                </div>
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

                <!-- Bootstrap core JavaScript
                    ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->

            </div>

            <div class ="col-md-5 bg-success">
                <p>col-md-7</p>
            </div>
        </div>

    </div>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>

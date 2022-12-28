@extends('client.appLayout.index')
@section('main-content')
<div class="products">
    <h1 >Tất cả sản phẩm</h1>
    <div class="image-slider">
        <div class="image-item">
            <div class="image">
                <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528" alt="">
            </div>
        </div>
        <div class="image-item">
            <div class="image">
                <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528" alt="">
            </div>
        </div>
        <div class="image-item">
            <div class="image">
                <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528" alt="">
            </div>
        </div>
        <div class="image-item">
            <div class="image">
                <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528" alt="">
            </div>
        </div>
        <div class="image-item">
            <div class="image">
                <img src="https://images.immediate.co.uk/production/volatile/sites/30/2020/08/processed-food700-350-e6d0f0f.jpg" alt="">
            </div>
        </div>
        
    </div>
    

    {{-- ----------------------------- --}}
    <div class="product">
        <div class="pro">
            
            <div class="pro-1">
                <div class="customsselects">
                    <div class="s1">
                                <h2>DANH MỤC</h2>
                                <div class="select">
                                    <input type="checkbox" id="toggle" class="toggle"> <label for="toggle">Thịt trứng</label>
                                    <ul>
                                        <li class="select-option"><input type="radio" name="choice" id="c1" value="c1"><label for="c1">Choice 1</label></li>
                                        <li class="select-option"><input type="radio" name="choice" id="c2" value="c2"><label for="c2">Choice 2</label></li>
                                        <li class="select-option"><input type="radio" name="choice" id="c3" value="c3"><label for="c3">Choice 3</label></li>
                                        <li class="select-option"><input type="radio" name="choice" id="c4" value="c4"><label for="c4">Choice 4</label></li>
                                        <li class="select-option"><input type="radio" name="choice" id="c5" value="c5"><label for="c5">Choice 5</label></li>
                                    </ul>	
                                    
                                </div>
                                <div class="select">
                                    <input type="checkbox" id="toggle4" class="toggle"> <label for="toggle4">Choose something</label>
                                    <ul>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c21" value="c1"><label for="c21">Choice 1</label></li>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c22" value="c2"><label for="c22">Choice 2</label></li>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c23" value="c3"><label for="c23">Choice 3</label></li>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c24" value="c4"><label for="c24">Choice 4</label></li>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c25" value="c5"><label for="c25">Choice 5</label></li>
                                    </ul>	
                                </div>	
                                <div class="select">
                                    <input type="checkbox" id="toggle2" class="toggle"> <label for="toggle2">Thịt trứng</label>
                                    <ul>
                                        <li class="select-option"><input type="radio" name="choice" id="c1" value="c1"><label for="c1">Choice 1</label></li>
                                        <li class="select-option"><input type="radio" name="choice" id="c2" value="c2"><label for="c2">Choice 2</label></li>
                                        <li class="select-option"><input type="radio" name="choice" id="c3" value="c3"><label for="c3">Choice 3</label></li>
                                        <li class="select-option"><input type="radio" name="choice" id="c4" value="c4"><label for="c4">Choice 4</label></li>
                                        <li class="select-option"><input type="radio" name="choice" id="c5" value="c5"><label for="c5">Choice 5</label></li>
                                    </ul>	
                                    
                                </div>
                                <div class="select">
                                    <input type="checkbox" id="toggle0" class="toggle"> <label for="toggle0">Choose something</label>
                                    <ul>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c21" value="c1"><label for="c21">Choice 1</label></li>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c22" value="c2"><label for="c22">Choice 2</label></li>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c23" value="c3"><label for="c23">Choice 3</label></li>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c24" value="c4"><label for="c24">Choice 4</label></li>
                                        <li class="select-option"><input type="checkbox" name="choice2" id="c25" value="c5"><label for="c25">Choice 5</label></li>
                                    </ul>	
                                </div>	
                    
                           
                    
                    
                    </div>
                   
                    </div>
            </div>
            <div class="pro-1">
                <form class="pro-text">
                    <p>Thương hiệu</p>
                    <input type="radio" id="html" name="fav_language" value="HTML">
                    <label for="html">HTML</label><br>
                    <input type="radio" id="css" name="fav_language" value="CSS">
                    <label for="css">CSS</label><br>
                    <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                    <label for="javascript">JavaScript</label>
                  
                    <br>  <br>
                  
                    <p>Loại</p>
                      <input type="radio" id="html" name="fav_language" value="HTML">
                      <label for="html">HTML</label><br>
                      <input type="radio" id="css" name="fav_language" value="CSS">
                      <label for="css">CSS</label><br>
                      <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                      <label for="javascript">JavaScript</label>
                  </form>
            </div><br>
            {{-- -----------------pro new--------------- --}}
            <div class="pro-1">
                <h2>MẸO ĂN NGON</h2>
                <div class="pro-new">
                    <div class="img">
                        <img src="https://images.foody.vn/res/g75/746974/s/foody-iron-steak-541-636656054845773740.jpg" alt="">
                    </div>
                    <p>Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia</p>
                </div>
                <div class="pro-new">
                    <div class="img">
                        <img src="https://images.foody.vn/res/g75/746974/s/foody-iron-steak-541-636656054845773740.jpg" alt="">
                    </div>
                    <p>Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia</p>
                </div>
                <div class="pro-new">
                    <div class="img">
                        <img src="https://images.foody.vn/res/g75/746974/s/foody-iron-steak-541-636656054845773740.jpg" alt="">
                    </div>
                    <p>Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia</p>
                </div>
                <div class="pro-new">
                    <div class="img">
                        <img src="https://images.foody.vn/res/g75/746974/s/foody-iron-steak-541-636656054845773740.jpg" alt="">
                    </div>
                    <p>Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia</p>
                </div>
            </div>
        </div>
        {{-- ------------------------------- --}}
        <div class="pro">
           
            <div class="pro-xep">
                <div class="pro-x">
                    <p>Sắp xếp:</p>
                </div>
                <div class="pro-x">
                    <input type="radio" name="" id="">
                <label>A-Z</label>
                </div>
                <div class="pro-x">
                    <input type="radio" name="" id="">
                <label>Z-A</label>
                </div>
                <div class="pro-x">
                    <input type="radio" name="" id="">
                <label>Giá tăng dần</label>
                </div>
                <div class="pro-x">
                    <input type="radio" name="" id="">
                <label>Giá giảm dần</label>
                </div>
                <div class="pro-x">
                    <input type="radio" name="" id="">
                <label>Mới nhất</label>
                </div>
                <div class="pro-x">
                    <input type="radio" name="" id="">
                <label>Cũ nhất</label>
                </div>
            </div>
            <div class="pro-pros">
                <div class="pro-pro"></div>
                <div class="pro-pro"></div>
                <div class="pro-pro"></div>
                <div class="pro-pro"></div>
                <div class="pro-pro"></div>
                <div class="pro-pro"></div>
                <div class="pro-pro"></div>
                <div class="pro-pro"></div>


            </div>
            
        </div>
        
    </div>

    
</div>
@endsection
@extends('admin.appLayout.index')
@section("css")

@endsection
@section('content')
<style>
    .main{
    width: 90%;
    margin: auto
    }
    .box1{
        display: flex;
    }
    .box2{
        float: right;
    }
    .box3{
        border: 1px solid black;
        border-left: none;
        border-right: none;
        display: flex;
        margin-top:30px
    }
    .box3 .box-item .boxx{
        display: flex
    }
    .box3 .box-item{
        border-left: 1px solid black;
        margin:10px;
        padding:10px
    }
    .box3 .box-item:first-child{
        border: none;
        
    }
</style>
<div class= "container-fluid main">
    <div class= "row">
       <div class ="col-sm-9 ">
          <div class="box1">
            <h3>Thượng hạn</h3>
            <p>Chi nhánh 1</p>

          </div>
          <div class="box2">
            <button>Hủy</button>
            <button>In</button>
            <button>In mã vạch</button>
            <button>Sửa</button>
          </div>    
          <br>
          <div class="box3">
            <div class="box-item">
                <p>Hóa đơn từ</p>
                <p>Xuất hóa đơn từ</p>
                <p>Liên hệ</p>

            </div>
            <div class="box-item">
                <div class="boxx">
                    <div class="box-text">
                        <p>---</p>
                    </div>
                    <div class="box-text">
                        <p>Hẹn giao</p>
                        <p>Tham chiếu</p>
                        <p>Điện thoại</p>
                    </div>
                </div>
            </div>
            <div class="box-item">
            <div class="boxx">
                <div class="box-text">
                    <p>Ngày nào đó</p>
                    <p>---</p>
                    <p>0255669336</p>

                </div>
                <div class="box-text">
                    <p>Thuế</p>
                    <p>Bảng giá</p>
                    <p>Email</p>
                </div>
            </div>
            </div>
            <div class="box-item">
                <p>Chưa bao gồm thuế</p>
                <p>Gia nhập 1</p>
                <p>---</p>
            </div>
          </div>
          <div class="box4">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
          </div>

       </div>
       <div class ="col-sm-3">
          <div class="box5">
            <h3>Thanh toán</h3>
            <div class="box-con">
                <div class="box-item-right">
                    <p>Còn lại phải trả</p>
                    <p>0</p>
                </div>
                <div class="box-item-right">
                    <p>Hóa đơn 1</p>
                    <p>Chi tiết thanh toán</p>
                </div>
            </div>
            <div class="box5">
                <h3>Nhập kho</h3>
                <button>Nhập kho</button>
            </div>
          </div>

       </div>
    </div>
 </div>
@endsection

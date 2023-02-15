<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<style>
    .listSP {
        padding: 50px 150px;
       

    }
    .listSP h3 {
        padding: 10px;
        background: #eeee;
        color: #000;
        border-radius:10px
    }
    .listSP img {
        width: 100px;
    }
    .table {
        text-align: center
    }
</style>
<div class="listSP">
    <h3>Danh sách sản phẩm</h3>
<table class="table">
    <thead class="table-light ">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên sản phẩm</th> 
        <th scope="col">Mã sản phẩm </th>
        <th scope="col">Mã loại sản phẩm </th>
        <th scope="col">Số lượng</th>
            <th scope="col">Hình ảnh</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($result as $k) 

      <tr>
        <th scope="row">{{$k->product_id}}</th>
        
        <td>{{$k->product_name}} </td>
        <td>{{$k->product_code}}</td>
        <td>{{$k->category_name}}</td>
        <td>{{$k->quantity}}</td>
        <td><img src="{{asset('/images/sp1.jpg')}}" alt=""></td>
        <td> 
<button type="button" class="btn btn-outline-info">Sửa</button>
<button type="button" class="btn btn-outline-danger">Xóa</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

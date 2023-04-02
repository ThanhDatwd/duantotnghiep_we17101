@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
@endsection
@section('content')
<style>
    .text h2{
        margin: auto;
        text-align: center;
    }
</style>

<form action="/admin/coupon/create" enctype="multipart/form-data" method="post">
    @csrf
    <div class="adproduct">
<div class="text">

    <h2 >THÊM MÃ GIẢM GIÁ</h2>
</div>
        
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <div class= "container-fluid col-12 m-auto coupou">
            <div class= "row">
               <div class ="col-md-12 col-sm-6 ">
                <div class="boxlist1">
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Mã giảm giá<span>(*)</span></p>
                            <input type="text" name="coupon_code" value="{{old('coupon_code')}}" placeholder="   Nhập mã giảm giá">
                            @error('coupon_code')
                            <span class="badge badge-danger">{{ $message }}</span>                         @enderror

                        </div>
                    </div>
                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Loại giảm giá <span>(*)</span></p>
                            <select name="coupon_type">
                                <option value="1">Giảm giá theo số tiền</option>
                                <option value="2">Giảm giá theo %</option>
                                <option value="3">Giảm giá theo đơn hàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Nhập số % hoặc tiền giảm <span>(*)</span></p>
                            <input type="number" name="discount" value="{{old('discount')}}" placeholder="Nhập nguồn hàng">
                            @error('discount')
                            <span class="badge badge-danger">{{ $message }}</span>                         @enderror

                        </div>
                        
                    </div>
                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Điều kiện sử dụng<span>(*)</span></p>
                            <input type="number" name="min_condition" value="{{old('min_condition')}}" placeholder="Nhập số lượng mã">
                            @error('min_condition')
                            <span class="badge badge-danger">{{ $message }}</span>                         @enderror

                        </div>
                        
                    </div>
                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Giới hạn người sử dụng</p>
                            <input type="number" name="limit_used" value="{{old('limit_used')}}" placeholder="Nhập giới hạn người dùng">
                            @error('limit_used')
                            <span class="badge badge-danger">{{ $message }}</span>                         @enderror

                        </div>
                        
                    </div>
                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Trang thái<span>(*)</span></p>
                            <select name="is_active" id="">
                                <option value="1">Hoạt động</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Ngày bắt đầu</p>
                            <input type="datetime-local" value="{{old('start_date')}}" name="start_date" >
                            @error('start_date')
                            <span class="badge badge-danger">{{ $message }}</span>                         @enderror

                        </div>
                        <div class="adpro1">
                            <p>Ngày kết thúc</p>
                            <input type="datetime-local" value="{{old('end_date')}}" name="end_date" >
                            @error('end_date')
                            <span class="badge badge-danger">{{ $message }}</span>                         @enderror

                        </div>
                        
                    </div>
            
                    <div class="addpro">    
                        <div class="adpro1">
                            <p>Miêu tả  <span>(*)</span></p>
                            <textarea name="description" id="" value="{{old('address')}}" cols="100" class="texlo" rows="5"></textarea>
                            @error('description')
                            <span class="badge badge-danger">{{ $message }}</span>                         @enderror

                        </div>
                    </div>

                    
                </div>
                
               </div>
         
        
    </div>
    <div class="ci"><button type="submit" class="btnmoi">Thêm mới</button>
        <a href="/admin/coupon">Hủy</a>
    </div>
               </div>
            </div>
         </div>
        
        </div>
                  
        
    
    </div>
</form>


@endsection
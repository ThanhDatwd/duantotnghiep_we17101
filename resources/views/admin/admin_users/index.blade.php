@extends('admin.appLayout.index')
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('admin/admin_users/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
  @csrf

                   <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Quản lý Admin</h6>
                            <div class="table-responsive">
                       <table class="table">
                     <thead>
                     <tr>
                  <th></th>
                                         <th scope="col"></th>
                                            <th scope="col">Hình đại diện</th>
                                            <th scope="col">Tên Admin</th>

                                            <th scope="col">Tài khoản</th>
                                            <th scope="col">Email</th>
                                          <th scope="col">Số điện thoại</th> 
                                            <th scope="col"></th>
                                            
                                            
              </tr>
          </thead>
          <tbody>
            @foreach ($users as $item)
              <tr>
                <th></th>
                  <td><input type="checkbox" name="check[]" value="{{$item->id}}"></td>
                  <td><img src="{{asset('upload/'.$item->avatar)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" style="width: 100px;height: 100px;"></td>
                  </td>
           
                                    
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->full_name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                    
                                    
                                       
                                       
                                         <td colspan="">
                                            <a href="{{url('admin/admin_users/capnhat/'.$item->id)}}" class="btn btn-primary">Sửa</a>
                                            <a href="{{url('admin/admin_users/xoa/'.$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger">Xóa</a>
                                             
                                        </td>
                                        
                                      
                                    </tr>
                                    <tr>
                                       
                                    </tr>
                                    @endforeach
                                    </tbody>
                                     

                
                
                  
                  {{-- <td>{{$categories->$p->name}}</td> --}}
                  <td class="button">
                    {{-- <a style="color: cadetblue" href="{{url('admin/admin_users/capnhat/'.$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a style="color: red" href="{{url('admin/admin_users/xoa/'.$item->id)}}" onclick="return myFunction();"> <i  class="fa-sharp fa-solid fa-trash"></i> </a> --}}
                   
                

                    {{-- <button onclick="myFunction()">XÓa</button> --}}
                    <script>
                      function myFunction() {
                          if(!confirm("Bạn có chắc chắn muốn xóa không!!"))
                          event.preventDefault();
                      }
        </script>
        </td>

        </tr>

        </tbody>


              </tr>
          </tbody>
        
          
      </table>



      <nav aria-label="Page navigation example">
        <ul class="pagination" style="display: flex;justify-content:space-between;">

          <li> {{$users->appends(request()->all())->links()}} </li>

          <li>
            <a href="{{url('admin/admin_users/them')}}" class="btn btn-primary">Thêm</a>

            <a href="{{url('admin/admin_users/thung-rac')}}" class="btn btn-primary">Thùng rác
              <?php
                                                $count = DB::table('administrators')->where('deleted_at','!=',null)->count();
                                                ?>
              ({{$count}})

            </a>
            <button type="submit" class="btn btn-danger">Xóa nhiều</button>
          </li>


        </ul>
      </nav>
    </div>
  </div>



</form>

@endsection

</form>
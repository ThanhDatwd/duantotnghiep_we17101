@extends('admin.appLayout.index')
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('admin/admin_users/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="container-fluid pt-4 px-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Quản lý Admin</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Check</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Name</th>

                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Level</th>
                                           
                                            
                                            
                                            <th scope="col">Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $item)
                                    <tr>
                                        <td><input type="checkbox" name="check[]" value="{{$item->id}}"></td>
                                        <td><img src="{{asset('upload/'.$item->avatar)}}" alt="" width="100px" height="100px"></td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->full_name}}</td>
                                        <td>{{$item->email}}</td>
                                    
                                    
                                         <td>
                                            {{$item->role_id}}
                                         </td>
                                        
                                       
                                         <td colspan="">
                                            <a href="{{url('admin/admin_users/capnhat/'.$item->id)}}" class="btn btn-primary">Sửa</a>
                                            <a href="{{url('admin/admin_users/xoa/'.$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger">Xóa</a>
                                             
                                        </td>
                                        
                                      
                                    </tr>
                                    <tr>
                                       
                                    </tr>
                                    @endforeach
                                    </tbody>
                                     

                                 <tfoot>
                                    <tr>
                                       
                                     
                                        <td>
                                           <style>
                                                  .pagination{
                                                    display: flex;
                                                    justify-content: center;
                                                  }
                                                  .pagination a{
                                                    padding: 10px;
                                                    border: 1px solid #ccc;
                                                    margin: 0 5px;
                                                    text-decoration: none;
                                                    color: #000;
                                                  }
                                                  .pagination a.active{
                                                    background: #000;
                                                    color: #fff;
                                                  }
                                           </style>
                                     <div class="pagination">
    @if ($users->currentPage() > 0)
        <a href="{{ $users->previousPageUrl() }}">Previous</a>
    @endif

    @for ($i = 1; $i <= $users->lastPage(); $i++)
        <a href="{{ $users->url($i) }}" 
           class="{{ ($users->currentPage() == $i) ? ' active' : '' }}">
           {{ $i }}
        </a>
    @endfor

    @if ($users->hasMorePages())
        <a href="{{ $users->nextPageUrl() }}">Next</a>
    @endif
</div>
                                          
                                        </td>
                                        <td>
                                           
                                    

                                            <a href="{{url('admin/admin_users/them')}}" class="btn btn-primary">Thêm</a>
                                                  
                                            <a href="{{url('admin/admin_users/thung-rac')}}" class="btn btn-primary">Thùng rác
                                                <?php
                                                $count = DB::table('administrators')->where('deleted_at','!=',null)->count();
                                                ?>
                                                ({{$count}})
                                                
                                            </a>
                                                <button type="submit" class="btn btn-danger">Xóa nhiều</button>
                                              
                                        </td>
                                    </tr>
                                 </tfoot>
                                </table>
                                
                            </div>
                        </div>
                    </div>
            
                </div>


</form>

@endsection

</form>

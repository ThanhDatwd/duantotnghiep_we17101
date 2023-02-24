@extends('admin.appLayout.index')
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('admin/categories_news/xoa-nhieu')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="container-fluid pt-4 px-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Tin rác</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Check</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Summary</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Category</th>
                             
                                            
                                            <th scope="col">Image</th>
                                            
                                            
                                            <th scope="col">Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories_news as $item)
                                    <tr>
                                        <td><input type="checkbox" name="check[]" value="{{$item->id}}"></td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->summary}}</td>
                                        <td>author</td>
                                        <td>{{$item->created_at}}</td>
                                         <td>
                                            {{$item->category_name}}
                                         </td>
                                        
                                        <td><img src="{{asset('upload/'.$item->thumb)}}" alt="" width="100px" height="100px"></td>
                                         <td colspan="">
                                            <a href="{{url('admin/news/capnhat/'.$item->id)}}" class="btn btn-primary">Sửa</a>
                                            <a href="{{url('admin/news/xoa/'.$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger">Xóa</a>
                                             
                                        </td>
                                        
                                      
                                    </tr>
                                    <tr>
                                       
                                    </tr>
                                    @endforeach
                                    </tbody>
                                     

                                 <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                         
                                        </td>
                                     
                                        <td>
                                           
                                     <div class="pagination">
    @if ($categories_news->currentPage() > 0)
        <a href="{{ $categories_news->previousPageUrl() }}">Previous</a>
    @endif

    @for ($i = 1; $i <= $categories_news->lastPage(); $i++)
        <a href="{{ $categories_news->url($i) }}" 
           class="{{ ($categories_news->currentPage() == $i) ? ' active' : '' }}">
           {{ $i }}
        </a>
    @endfor

    @if ($categories_news->hasMorePages())
        <a href="{{ $categories_news->nextPageUrl() }}">Next</a>
    @endif
</div>
                                          
                                        </td>
                                        <td>
                                           
                                    

                                            <a href="{{url('admin/categories_news/them')}}" class="btn btn-primary">Thêm</a>
                                        <a href="{{url('admin/categories_news/phuc-hoi-tat-ca')}}" class="btn btn-primary">Phục hồi

                                        <span>
                                            (<?php
                                            $count = DB::table('categories_news')->where('deleted_at','!=',null)->count();
                                            echo $count;
                                            ?>)
                                            
                                        </span>
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

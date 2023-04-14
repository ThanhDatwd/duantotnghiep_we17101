
@extends('admin.appLayout.index')
@section('content')
    <div class="p-4">
        <div class="text-start">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <div>Lịch sử nhập hàng</div>
               <div class="adding">
                <a href="admin/news/them"><i class="fa-solid fa-circle-plus fs-3"></i></a>
             </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead >
                            <tr class="text-dark table-info">
                                <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                <th scope="col">Mã phiếu</th>
                                <th scope="col">Ngày nhập</th>
                                <th scope="col">Người nhập</th>
                                <th scope="col">Nhà cung cấp</th>
                                <th scope="col" class="text-center">Trạng thái</th>
                                <th scope="col">Tổng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchase_histories as $item)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>{{$item->purchase_code}}</td>
                                <td> {{date('d-m-Y', strtotime($item->created_at))}}</td>
                                <td>{{$item->created_by!=null?$item->created_by:"Admin"}}</td>
                                <td>{{$item->brand!=null?$item->brand:"(Không nhập)"}}</td>
                                <td class="text-center">
                                    @if ($item->purchase_status==true)
                                    <button class="btn btn-sm btn-success rounded-pill">Hoàn thành</button>
                                    @else
                                       <button class="btn btn-sm btn-secondary rounded-pill">Lưu tạm</button>
                                    @endif
                                </td>
                                <td>
                                    {{number_format($item->total_cost)}} VNĐ
                                </td>
                                <td>
                                    <a href="{{route('siteshow-purchase-history-detail',['id'=>$item->id])}}">Xem</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection
@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/account.css')}}">
@endsection
@section('main-content')
<div class="container">
    <h3 class="my-3">Lịch sử đơn hàng</h3>
    <div class="user-page__order">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Đơn hàng</th>
                    <th>Ngày</th>
                    {{-- <th>Địa chỉ</th> --}}
                    <th>Giá trị đơn hàng</th>
                    <th>TT thanh toán</th>
                    <th>TT vận chuyển</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $myOrderList as  $item )
                <tr>
                    <th><a href="">#{{$item->code}}</a></th>
                    <td>{{date("d-m-Y", strtotime($item->created_at))}}</td>
                    {{-- <td>{{$item->address}}, {{$item->ward}}, {{$item->district}}, {{$item->province}} </td> --}}
                    <td class="price">{{number_format($item->total)}} vnđ</td>
                    <td>
                        @if ($item->status == 1)
                           Đang chờ xác nhận
                        @elseif ($item->status == 2)
                            Đã xác nhận
                        @elseif ($item->status == 3)
                             Đang giao
                        @elseif ($item->status == 4)
                             Hoàn thành
                        @else
                             Hủy
                        @endif
                    </td>
                    <td>
                        @if ($item->payment_type=="ATM")
                            Online
                        @elseif ($item->payment_type=="COD")
                            COD
                        @else
                            COD
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{route("clientaccount-show-order-detail",['code'=>$item->code])}}" class="btn btn-outline-success">Xem</a>
                    </td>
                </tr>
                @endforeach
    
            </tbody>
        </table>
    </div>
</div>
@endsection
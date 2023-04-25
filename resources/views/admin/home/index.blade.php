@extends('admin.appLayout.index')
@section("css")
@endsection
@section('content')
<?php 
use Symfony\Component\Routing\Router;
?>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Tổng số lượng sản phẩm</p>
                                <h6 class="mb-0">
                                    {{$totalProducts}}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Tổng số lượng tin tức</p>
                                <h6 class="mb-0">
                                    {{$totalNews}}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Tổng số đơn hàng</p>
                                <h6 class="mb-0">
                                    {{$totalOrders}}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Số lượng khách hàng</p>
                                <h6 class="mb-0">
                                    {{$totalOrders}}
                                </h6>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12" >
                        <div class="bg-light text-center rounded p-4" >
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Thống kê doanh thu</h6>
                                 <div class="d-flex gap-2 " id="form-statistical-revenue">
                                    <select class="form-select form-select-sm"  name="month">
                                        @foreach(range(1, 12) as $month)
                                            <option value="{{ $month }}" {{ date('m') == $month ? 'selected' : '' }}>Tháng {{$month}}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-select form-select-sm"  name="month">
                                        @foreach(range(date('Y'), date('Y')+10) as $y)
                                            <option value="{{ $y }}" {{ date('m') == $y ? 'selected' : '' }}>Năm {{$y}}</option>
                                        @endforeach
                                    </select>
                                    <button class=" btn btn-sm btn-primary">Lọc</button>
                                    
                                </div>
                            </div>
                            <canvas id="thongke" style=""></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Thống kê đơn hàng</h6>
                                <div class="d-flex gap-2 " id="select-statistical-order">
                                    <select class="form-select form-select-sm" id="select-statistical-order-type"  name="type">
                                         <option value="date" selected>Theo ngày</option>
                                         <option value="month">Theo tháng</option>
                                    </select>
                                    <select class="form-select form-select-sm"  id="select-statistical-order-month" name="month">
                                        @foreach(range(1, 12) as $month)
                                            <option value="{{ $month }}" {{ date('m') == $month ? 'selected' : '' }}>Tháng {{$month}}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-select form-select-sm" id="select-statistical-order-year"  name="year">
                                        @foreach(range(date('Y'), date('Y')+10) as $y)
                                            <option value="{{ $y }}" {{ date('m') == $y ? 'selected' : '' }}>Năm {{$y}}</option>
                                        @endforeach
                                    </select>
                                    <button class=" btn btn-sm btn-primary btn-fillter" id="btn-statistical-order">Lọc</button>
                                </div>
                            </div>
                            <canvas id="thongke2"></canvas>
                        </div>
                    </div>
                
                </div>
            </div>
            <!-- Sales Chart End -->
        <!-- Content End -->
    <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Sản phẩm bán chạy nhất</h6>
                        <a href="">Hiển thị tất cả/a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Gía bán</th>
                                    <th scope="col">Đã bán</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($selling_products as $item)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>
                                       
                                       <img src="{{asset('upload/'.$item->thumb)}}" style="width: 50px; height: 50px; " alt="">
                                    </td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{number_format($item->price_current)}} VNĐ
                                    </td>
                                    <td> {{date('d-m-Y', strtotime($item->created_at))}}</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Chi tiết</a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

</canvas>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Green Market</a>, 2023. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Thiết kế bởi <a href="https://htmlcodex.com">Green Market</a>
                        </br>
                        Phân phối <a class="border-bottom" href="https://themewagon.com" target="_blank">Green Market</a>
                        </div>
                    </div>
                </div>
            </div>

<script>
    //  $(window).scroll(function () {
    //     if ($(this).scrollTop() > 300) {
    //         $(".back-to-top").fadeIn("slow");
    //     } else {
    //         $(".back-to-top").fadeOut("slow");
    //     }
    // });
    // $(".back-to-top").click(function () {
    //     $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    //     return false;
    // });
    // // Sidebar Toggler
    // $(".sidebar-toggler").click(function () {
    //     $(".sidebar, .content").toggleClass("open");
    //     return false;
    // });
    // // Progress Bar
    // $(".pg-bar").waypoint(
    //     function () {
    //         $(".progress .progress-bar").each(function () {
    //             $(this).css("width", $(this).attr("aria-valuenow") + "%");
    //         });
    //     },
    //     { offset: "80%" }
    // );
    // // Calender
    // $("#calender").datetimepicker({
    //     inline: true,
    //     format: "L",
    // });
    // // Testimonials carousel
    // $(".testimonial-carousel").owlCarousel({
    //     autoplay: true,
    //     smartSpeed: 1000,
    //     items: 1,
    //     dots: true,
    //     loop: true,
    //     nav: false,
    // });
   
    
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('thongke');
  const ctx2 = document.getElementById('thongke2');

  // Định nghĩa biểu đồ
  let ChartStatisticalProfit=null;
  function createChartStatisticalProfit(revenues=[],profits=[], labels=[]) {
    if (ChartStatisticalProfit !== null) {
        ChartStatisticalProfit.destroy();
    }
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [
                {
                label: "Doanh thu",
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderWidth: 1,
                data:revenues
                },
                {
                label: "Lợi nhuận",
                backgroundColor: "rgba(255,99,132,0.4)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 1,
                data: profits
                }
            ]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    }
  // Gọi hàm để tạo biểu đồ
  const callApiStatisticalProfit=()=>{
    $.get("http://127.0.0.1:8000/api/statistical/dtln",
    // {
    //     type:$("#select-statistical-order-type").val(),
    //     month:$("#select-statistical-order-month").val(),
    //     year:$("#select-statistical-order-year").val()
    // },
    function (data, textStatus, jqXHR) {
        console.log(data)
        let labelss=data.revenues.map((item)=>item.time)
        let revenues=data.revenues.map((item)=>Number(item.revenue))
        let profits=data.profits.map((item,index)=>Number(data.revenues[index].revenue)-Number(item.profit))
         createChartStatisticalProfit(revenues,profits,labelss)
    },
    "json"
);
}
callApiStatisticalProfit()
 



// PHẦN GOI API THỐNG KÊ ĐƠN HÀNG
let ChartStatisticalOrder=null;
const createChartStatisticalOrder=(datas=[],labels=[])=>{
    if (ChartStatisticalOrder !== null) {
        ChartStatisticalOrder.destroy();
    }
    ChartStatisticalOrder = new Chart(ctx2, {
            type: 'line',
            data: {
            labels: labels,
            datasets: [
                    {
                    label: "Đơn hàng",
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderWidth: 1,
                    data: datas
                    },
                ]
            },
            options: {
            scales: {
                yAxes: [{
                ticks: {
                    beginAtZero: true
                }
                }]
            }
            }
        });
}
const callApiStatisticalOrder=()=>{
    $.get("http://127.0.0.1:8000/api/statistical/orders",
    {
        type:$("#select-statistical-order-type").val(),
        month:$("#select-statistical-order-month").val(),
        year:$("#select-statistical-order-year").val()
    },
    function (data, textStatus, jqXHR) {
        let labelss=data.orders.map((item)=>item.time)
        let datass=data.orders.map((item)=>item.count_order)
         console.log(datass)
        createChartStatisticalOrder(datass,labelss)
    },
    "json"
);
}
callApiStatisticalOrder()

$("#btn-statistical-order").click(function (e) { 
    e.preventDefault();
    callApiStatisticalOrder()
});

//  PHẦN GOI API THỐNG KÊ DOANH SỐ LỢI NHUẬN
$.get("http://127.0.0.1:8000/api/statistical/dtln",
    function (data, textStatus, jqXHR) {
        console.log(data)
    },
    "dataType"
);

</script>

              <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Template Javascript -->
  
    <script src="js/main.js"></script>
            <!-- Footer End -->

@endsection
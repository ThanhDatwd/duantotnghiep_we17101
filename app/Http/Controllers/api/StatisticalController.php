<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function statistical__order(Request $request)
    {
        try {
            $orders = [];
            $type = $request->type ?? 'date';
            $year = $request->year ?? date('Y');
            $month = $request->month ?? date('m');
            switch ($type) {
                case 'date':
                    // return response()->json(["message" => "success", "orders" => 'đay là dâte']);
                    $orders = DB::table('orders')
                        ->select(DB::raw('DATE(created_at) as time'), DB::raw('COUNT(id) as count_order'))
                        // ->where('status', '=', 4)
                        ->whereYear('created_at', '=', $year)
                        ->whereMonth('created_at', '=', $month)
                        ->groupBy('time')
                        ->orderBy('time', 'ASC')
                        ->get();
                    return response()->json(["message" => "success", "orders" => $orders]);

                    break;
                case 'month':
                    // return response()->json(["message" => "success", "orders" => 'đay là year']);

                    $orders = DB::table('orders')
                        ->select(DB::raw('MONTH(created_at) as time'), DB::raw('COUNT(id) as count_order'))
                        // ->where('status', '=', 2)
                        ->whereYear('created_at', '=', $year)
                        ->groupBy('time')
                        ->orderBy('time', 'ASC')
                        ->get();
                    return response()->json(["message" => "success", "orders" => $orders]);

                    break;
                default:
                    # code...
                    break;
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th], 500);
        }
    }
    public function statistical__dt(Request $request)
    {  
        try {
            $type = $request->type ?? 'date';
            $year = $request->year ?? date('Y');
            $months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
            $revenueTemp = [];
            $profitTemp = [];
            foreach ($months as $month) {
                $revenueTemp[$month] = 0;
                $profitTemp[$month] = 0;
            }
            // THÓNG KÊ DOANH THU
            $revenues = DB::table('orders')
                ->select(DB::raw('MONTH(created_at) as time'), DB::raw('SUM(total) as revenue'))
                ->whereYear('created_at', '=', $year)
                ->groupBy('time')
                ->orderBy('time', 'ASC')
                ->get();
            foreach ($revenues as $revenue) {
                $revenueTemp[$revenue->time] = $revenue->revenue;
            }
            // THỐNG KÊ LỢI NHUẬN
            $profits= DB::table('purchase_histories')
                ->select(DB::raw('MONTH(created_at) as time'), DB::raw('SUM(total_cost) as profit'))
                ->whereYear('created_at', '=', $year)
                ->groupBy('time')
                ->orderBy('time', 'ASC')
                ->get();
            foreach ($profits as $profit) {
                $profitTemp[$profit->time] =  $revenueTemp[$profit->time]-$profit->profit;
            }
            // purchase_histories
    
            $dataProfits = [];
            $dataRevenues=[];
            foreach ($months as $month) {
                $revenue = $revenueTemp[$month];
                $profit = $profitTemp[$month];
                $dataRevenues[] = ['time' => "$month/$year", 'revenue' => $revenue];
                $dataProfits[] = ['time' => "$month/$year", 'profit' => $profit];
            }
            return response()->json(["message" => "success", "revenues" => $dataRevenues,"profits"=>$dataProfits]);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th], 500);
        }
    }
}

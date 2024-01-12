<?php

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class StatisticalController extends Controller
{
    public function statistical()
    {
        $product = Product::all();
        $category = Category::all();
        $orders = Order::all();
        return response()->json(['msg' => 'Lấy dữ liệu thành công', 'data' => $product], 200);
    }
}

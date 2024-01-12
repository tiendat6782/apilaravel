<?php

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user(); // Lấy thông tin người dùng hiện tại
        // Example body request: {
        //     order: [
        //         {product_id: 1, quantity: 10},
        //         {product_id: 2, quantity: 20},
        //         ...
        //     ]
        // }
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 0      // 0: Chờ xác nhận -> 1: Xác nhận -> 2: Đang vận chuyển -> 3: Đã vận chuyển
        ]);
        if ($request->orders) {
            $orderData = $request->orders;
            foreach ($orderData as $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item['product_id'];
                $orderDetail->quantity = $item['quantity'];
                $orderDetail->save();
            }
        }
        return response()->json(['message' => 'Đã đặt hàng thành công']);
    }
    public function getListOrder()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->with('orderDetails', 'user')->get();
        return response()->json(['msg' => 'Lấy dữ liệu thành công', 'data' => $orders], 200);
    }
}

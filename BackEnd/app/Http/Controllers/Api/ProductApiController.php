<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json(['msg' => 'Lấy dữ liệu thành công', 'data' => $product], 200);
    }
    public function getCategory()
    {
        $category = Category::all();
        return response()->json(['msg' => 'Lấy dữ liệu thành công', 'data' => $category], 200);
    }
    public function detailProduct($id)
    {
        $product = Product::with(['variants.size', 'variants.color'])->find($id);

        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        return new ProductDetailResource($product);
    }
    public function addToCart($productId, $quantity)
{
    $user = auth()->user(); // Lấy thông tin người dùng hiện tại

    // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng thì cập nhật số lượng
    if ($cartItem = $user->cart()->where('product_id', $productId)->first()) {
        $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
    } else {
        // Nếu chưa tồn tại, thêm mới vào giỏ hàng
        $user->cart()->create([
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    return response()->json(['message' => 'Đã thêm vào giỏ hàng']);
}

}

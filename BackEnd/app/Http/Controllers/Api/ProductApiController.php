<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        try {
            $product = Product::with('variants')->findOrFail($id);

            // Chỉ lấy thông tin cần thiết từ mỗi biến thể (variants)
            $variants = $product->variants->map(function ($variant) {
                return [
                    'size' => $variant->size,
                    'color' => $variant->color,
                    'price' => $variant->price,
                ];
            });

            // Trả về thông tin chi tiết sản phẩm
            return response()->json([
                'id' => $product->id,
                'name' => $product->name,
                'variants' => $variants,
            ]);
        } catch (\Exception $e) {
            // Xử lý nếu không tìm thấy sản phẩm
            return response()->json(['error' => 'Product not found.'], 404);
        }
    }
}

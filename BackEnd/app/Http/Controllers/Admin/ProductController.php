<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::latest()->paginate(6);
        $category = Category::all();
        return view('admin.product.index', compact('product', 'category'));
    }

    // thểm sản phẩm mới
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id', // Kiểm tra xem category_id có tồn tại trong bảng categories hay không
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra và xác thực tệp hình ảnh (ví dụ: JPEG, PNG) và giới hạn kích thước tệp là 2MB (2048 KB)
            ],
            [
                'name.required' => 'Not empty. Please enter name',
                'description.required' => 'Not empty. Please enter description',
                'image.required' => 'Not empty. Please enter image',
                'image.image' => 'Only enter file image',
                'image.mimes' => 'Only enter jpeg, png, jpg, gif',
                'image.max' => 'Image < 2Mb',
            ]
        );

        if ($request->hasFile('image')) {
            $image = uploadFile('hinh', $request->file('image'));
        }

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->image = $image;
        $product->save();
        return redirect()->route('admin.product.index')->with(['msg' => 'Sản phẩm đã được thêm.']);
    }

    // sửa sản phẩm

    //xoá
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            // Delete the associated image from storage
            $imagePath = '/public/' . $product->image;
            Storage::delete($imagePath);

            // Delete the record from the database
            $product->delete();

            return redirect()->route('admin.product.index')->with(['msg' => 'Xoá thành công']);
        } else {
            // Handle the case where the record doesn't exist
            return redirect()->route('admin.product.index')->with(['msg' => 'Không tìm thấy sản phẩm']);
        }
    }
}

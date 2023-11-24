<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Variant;
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

    public function edit(Request $request, string $id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.update', compact('category', 'product'));
    }
    // public function update(Request $request, string $id)
    // {
    //     $request->validate(
    //         [
    //             'name' => 'required',
    //             'description' => 'required|string',
    //             'category_id' => 'required|exists:categories,id',
    //             'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Remove 'required' constraint for image
    //         ],
    //         [
    //             'name.required' => 'Not empty. Please enter name',
    //             'description.required' => 'Not empty. Please enter description',
    //             'image.image' => 'Only enter file image',
    //             'image.mimes' => 'Only enter jpeg, png, jpg, gif',
    //             'image.max' => 'Image < 2Mb',
    //         ]
    //     );

    //     $product = Product::find($id);

    //     // If a new image is provided, update it
    //     if ($request->hasFile('image')) {
    //         $oldImage = $product->image;

    //         // Delete the old image
    //         Storage::delete('/public/' . $oldImage);

    //         // Upload and store the new image
    //         $image = uploadFile('hinh', $request->file('image'));
    //     } else {
    //         // If no new image is provided, keep the old image
    //         $image = $product->image;
    //     }

    //     // Update the product with the new information using Eloquent
    //     $product->update([
    //         'category_id' => $request->category_id,
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'image' => $image,
    //     ]);

    //     return redirect()->route('admin.product.index')->with(['msg' => 'Cập nhật sản phẩm thành công!']);
    // }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id', // Kiểm tra xem category_id có tồn tại trong bảng categories hay không
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra và xác thực tệp hình ảnh (ví dụ: JPEG, PNG) và giới hạn kích thước tệp là 2MB (2048 KB)
            ],
            [
                'name.required' => 'Not empty. Please enter name',
                'description.required' => 'Not empty. Please enter description',
                'image.image' => 'Only enter file image',
                'image.mimes' => 'Only enter jpeg, png, jpg, gif',
                'image.max' => 'Image < 2Mb',
            ]
        );

        if ($id) {
            $image = DB::table('products')->where('id', $id)->select('image')->first()->image;
            if ($request->hasFile('image')) {
                $resultImg = Storage::delete('/public/' . $image);
                if ($resultImg) {
                    $image = uploadFile('hinh', $request->file('image'));
                }
            }
        }
        DB::table('products')->where('id', $id)->update([
            "category_id" => $request->category_id,
            "name" => $request->name,
            "description" => $request->description,
            "image" => $image,
        ]);
        return redirect()->route('admin.product.index')->with(['msg' => 'Cập nhật sản phẩm thành công!']);
    }
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


    //variant
    public function variant($id)
    {
        $variant = Variant::all();
        $size = Size::all();
        $color = Color::all();
        $product = Product::find($id);
        return view('admin.product.variant', compact('color', 'size', 'product', 'variant'));
    }


    public function createVariant(Request $request, string $id)
    {
        $product = Product::find($id);
        $request->validate([
            'size_id' => 'required',
            'color_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = uploadFile('hinh', $request->file('image'));
        }
        $variant = new Variant();
        $variant->product_id = $product->id;
        $variant->size_id = $request->size_id;
        $variant->color_id = $request->color_id;
        $variant->price = $request->price;
        $variant->quantity = $request->quantity;
        $variant->image = $image;
        $variant->save();
        return redirect()->back()->with(['msg' => 'Thêm biến thể thành công']);
    }
}

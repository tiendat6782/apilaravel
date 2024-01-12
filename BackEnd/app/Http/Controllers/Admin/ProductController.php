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
        $product->price = $request->price;
        $product->amount = $request->amount;

        $product->save();
        return redirect()->route('admin.product.index')->with(['success' => 'Sản phẩm đã được thêm.']);
    }

    // sửa sản phẩm

    public function edit(Request $request, string $id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.update', compact('category', 'product'));
    }

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
            "price" => $request->price,
            "amount" => $request->amount,
        ]);
        return redirect()->route('admin.product.index')->with(['success' => 'Cập nhật sản phẩm thành công!']);
    }
    //xoá
    public function destroy($id)
    {


        if ($id) {
            $exists = Variant::where('product_id', $id)->exists();

            if ($exists) {
                return redirect()->back()->with(['error' => 'Không thể xoá, sản phẩm có nhiều dữ liệu']);
            }
            $image = DB::table('products')
                ->where('id', $id)
                ->select('image')
                ->first()->image;

            Storage::delete('/public/' . $image);
            DB::table('products')->where('id', $id)->delete();

            return redirect()->route('admin.product.index')->with(['success' => 'Xoá thành công']);
        }
    }


    //variant
    public function variant($id)
    {
        $variant = Variant::where('product_id', $id)->get();
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
        $existingVariant = Variant::where('product_id', $product->id)
            ->where('size_id', $request->size_id)
            ->where('color_id', $request->color_id)
            ->first();

        if ($existingVariant) {
            return redirect()->back()->with(['error' => 'Biến thể đã tồn tại']);
        }
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
        return redirect()->back()->with(['success' => 'Thêm biến thể thành công']);
    }

    public function editVariant(Request $request, string $id, string $variantId)
    {
        $size = Size::all();
        $color = Color::all();
        $product = Product::find($id);
        $variant = Variant::find($variantId);
        return view('admin.product.edit', compact('product', 'variant', 'size', 'color'));
    }
    public function updateVariant(Request $request, string $id, string $variantId)
    {
        $product = Variant::find($id);
        $request->validate([
            'size_id' => 'required',
            'color_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Kiểm tra xem biến thể có tồn tại không
        $variant = Variant::find($variantId);
        $existingVariant = Variant::where('product_id', $product->id)
            ->where('size_id', $request->size_id)
            ->where('color_id', $request->color_id)
            ->first();

        if ($existingVariant) {
            return redirect()->back()->with(['error' => 'Biến thể đã tồn tại']);
        }
        if (!$variant) {
            return redirect()->back()->with(['error' => 'Biến thể không tồn tại']);
        }

        // Kiểm tra và xử lý hình ảnh
        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ
            Storage::delete('/public/' . $variant->image);

            // Upload hình ảnh mới
            $variant->image = uploadFile('hinh', $request->file('image'));
        }

        // Cập nhật thông tin biến thể
        $variant->size_id = $request->size_id;
        $variant->color_id = $request->color_id;
        $variant->price = $request->price;
        $variant->quantity = $request->quantity;
        $variant->save();

        return redirect()->route('product.variant', ['id' => $product->id])->with(['success' => 'Cập nhật biến thể thành công']);
    }
    public function deleteVariant(string $id, string $variantId)
    {
        // Tìm sản phẩm và biến thể tương ứng
        $product = Product::find($id);
        $variant = Variant::find($variantId);

        // Kiểm tra xem biến thể có tồn tại không
        if (!$variant) {
            return redirect()->back()->with(['error' => 'Biến thể không tồn tại']);
        }

        // Kiểm tra xem biến thể có thuộc sản phẩm không
        if ($variant->product_id != $product->id) {
            return redirect()->back()->with(['error' => 'Biến thể không thuộc sản phẩm']);
        }

        // Xóa hình ảnh của biến thể (nếu có)
        if ($variant->image) {
            Storage::delete('/public/' . $variant->image);
        }

        // Xóa biến thể
        $variant->delete();

        return redirect()->back()->with(['success' => 'Xóa biến thể thành công']);
    }
}

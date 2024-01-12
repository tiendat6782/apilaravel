<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.category.index', compact('category'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:categories',
                'description' => 'required',
            ],
            [
                'name.required' => "Đừng bỏ trống!",
                'name.unique' => "Danh mục này đã tồn tại",
                'description.required' => "Đừng bỏ trống!"
            ]
        );
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        return redirect()->route('admin.category.index')->with(['success' => 'Danh mục đã được thêm.']);
    }

    public function edit(Request $request, string $id)
    {
        $category = Category::find($id);
        return view('admin.category.update', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        // Kiểm tra xem có tồn tại danh mục không
        if ($category) {
            // Cập nhật thông tin của danh mục
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            // Lưu thay đổi vào cơ sở dữ liệu
            $category->save();
        } else {
            return redirect()->route('admin.category.index')->with(['error' => 'Có gì đó không đúng! Xin thử lại']);
        }
        return redirect()->route('admin.category.index')->with(['success' => 'Sửa thành công']);
    }


    public function destroy($id)
    {
        if ($id) {
            $exists = Product::where('category_id', $id)->exists();
            if ($exists) {
                return redirect()->route('admin.category.index')->with(['error' => 'Danh mục này đang tồn tại trong sản phẩm, lên không thể xoá!']);
            }

            DB::table('categories')->where('id', $id)->delete();
            return redirect()->route('admin.category.index')->with(['success' => 'Xoá thành công']);
        }
    }
}

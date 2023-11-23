<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return redirect()->route('admin.category.index')->with(['msg' => 'Danh mục đã được thêm.']);
    }
    public function destroy($id)
    {
        if ($id) {
            // Kiểm tra xem 'size_id' có tồn tại trong bảng 'attributes' hay không
            // $exists = Attribute::where('category_id', $id)->exists();

            // if ($exists) {
            //     return redirect()->back()->with(['msg' => 'category is associated with attributes. Cannot delete.']);
            // }
            // Xóa bản ghi trong bảng 'size'
            DB::table('categories')->where('id', $id)->delete();

            return redirect()->back();
        }
    }
}

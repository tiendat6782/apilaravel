<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    public function index()
    {
        $size = Size::latest()->get();
        return view('admin.size.index', compact('size'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:size',
                'description' => 'required',
            ],
            [
                'name.required' => "Đừng bỏ trống!",
                'name.unique' => "Size này đã tồn tại",
                'description.required' => "Đừng bỏ trống!"
            ]
        );
        $size = new Size();
        $size->name = $request->input('name');
        $size->description = $request->input('description');
        $size->save();
        return redirect()->route('admin.size.index')->with(['success' => 'Màu đã được thêm.']);
    }

    public function edit(Request $request, string $id)
    {
        $size = Size::find($id);
        return view('admin.size.update', compact('size'));
    }

    public function update(Request $request, string $id)
    {
        $size = Size::find($id);

        // Kiểm tra xem có tồn tại danh mục không
        if ($size) {
            // Cập nhật thông tin của danh mục
            $size->name = $request->input('name');
            $size->description = $request->input('description');
            // Lưu thay đổi vào cơ sở dữ liệu
            $size->save();
        } else {
            return redirect()->route('admin.size.index')->with(['error' => 'Có gì đó không đúng! Xin thử lại']);
        }
        return redirect()->route('admin.size.index')->with(['success' => 'Sửa thành công']);
    }
    public function destroy($id)
    {
        if ($id) {
            $exists = Variant::where('size_id', $id)->exists();
            if ($exists) {
                return redirect()->route('admin.size.index')->with(['error' => 'Size này đang tồn tại trong sản phẩm, lên không thể xoá!']);
            }
            DB::table('size')->where('id', $id)->delete();

            return redirect()->route('admin.size.index')->with(['success' => 'Xoá thành công']);
        }
    }
}

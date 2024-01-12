<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::latest()->get();
        return view('admin.color.index', compact('color'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:color',
                'description' => 'required',
            ],
            [
                'name.required' => "Đừng bỏ trống!",
                'name.unique' => "Màu này đã tồn tại",
                'description.required' => "Đừng bỏ trống!"
            ]
        );
        $color = new Color();
        $color->name = $request->input('name');
        $color->description = $request->input('description');
        $color->save();
        return redirect()->route('admin.color.index')->with(['success' => 'Màu đã được thêm.']);
    }
    public function edit(Request $request, string $id)
    {
        $color = Color::find($id);
        return view('admin.color.update', compact('color'));
    }

    public function update(Request $request, string $id)
    {
        $color = Color::find($id);

        // Kiểm tra xem có tồn tại danh mục không
        if ($color) {
            // Cập nhật thông tin của danh mục
            $color->name = $request->input('name');
            $color->description = $request->input('description');
            // Lưu thay đổi vào cơ sở dữ liệu
            $color->save();
        } else {
            return redirect()->route('admin.color.index')->with(['error' => 'Có gì đó không đúng! Xin thử lại']);
        }
        return redirect()->route('admin.color.index')->with(['success' => 'Sửa thành công']);
    }
    public function destroy($id)
    {
        if ($id) {
            $exists = Variant::where('color_id', $id)->exists();
            if ($exists) {
                return redirect()->route('admin.color.index')->with(['error' => 'Màu này đang tồn tại trong sản phẩm, lên không thể xoá!']);
            }
            DB::table('color')->where('id', $id)->delete();

            return redirect()->route('admin.color.index')->with(['success' => 'Xoá thành công']);
        }
    }
}

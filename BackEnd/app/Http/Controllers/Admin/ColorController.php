<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::latest()->paginate(6);
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
        return redirect()->route('admin.color.index')->with(['msg' => 'Màu đã được thêm.']);
    }
    public function destroy($id)
    {
        if ($id) {
            // Kiểm tra xem 'size_id' có tồn tại trong bảng 'attributes' hay không
            // $exists = Attribute::where('color_id', $id)->exists();

            // if ($exists) {
            //     return redirect()->back()->with(['msg' => 'Color is associated with attributes. Cannot delete.']);
            // }
            // Xóa bản ghi trong bảng 'size'
            DB::table('color')->where('id', $id)->delete();

            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
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
        return redirect()->route('admin.size.index')->with(['msg' => 'Màu đã được thêm.']);
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
            DB::table('size')->where('id', $id)->delete();

            return redirect()->back();
        }
    }
}

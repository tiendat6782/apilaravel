<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ListProducts extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $showEditModal = false;
    public $item;
    public $productId;
    public $state = [];
    public $selectedCategory;
    public $categories;

    #[Title('Product')]

    public function showModelCreate()
    {
        $this->showEditModal = false;
        $this->reset();
        $this->dispatch('show-form');
    }
    public function createProduct()
    {

        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id', // Kiểm tra xem category_id có tồn tại trong bảng categories hay không
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra và xác thực tệp hình ảnh (ví dụ: JPEG, PNG) và giới hạn kích thước tệp là 2MB (2048 KB)
            ],
            [
                'name.required' => 'Không bỏ trống vui lòng nhập name',
                'description.required' => 'Không bỏ trống vui lòng nhập description',
                'image.required' => 'Không bỏ trống vui lòng tải image lên',
                'category_id.required' => "Chọn danh mục",
                'image.image' => 'Định dạng không hợp lệ, vui lòng chọn một file hình ảnh.',
                'image.mimes' => 'Chỉ chấp nhận các định dạng ảnh: jpeg, png, jpg, gif.',
                'image.max' => 'Dung lượng tối đa cho phép là 2048 KB.',
            ]
        )->validate();
        if (isset($this->state['image'])) {
            $imagePath = $this->state['image']->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
        Product::create($validatedData);
        $this->dispatch('hide-form', [' Thêm thành công !']);
    }
    public function edit(Product $item)
    {
        $this->showEditModal = true;
        $this->item = $item;
        $this->state = $item->toArray();
        $this->dispatch('show-form');
    }

    public function updateProduct()
    {
        // dd($this->item->image);

        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Không bỏ trống vui lòng nhập name',
                'description.required' => 'Không bỏ trống vui lòng nhập description',
                'category_id.required' => 'Chọn danh mục',
                'image.image' => 'Chỉ chấp nhận tệp hình ảnh',
                'image.mimes' => 'Chỉ chấp nhận các định dạng: jpeg, png, jpg, gif',
                'image.max' => 'Kích thước ảnh không được lớn hơn 2MB',
            ]
        )->validate();
        if (isset($this->item->image)) {
            // Xử lý tải lên và lưu trữ hình ảnh
            $imagePath = $this->state['image']->store('images', 'public');
            $validatedData['image'] = $imagePath;

            // Xóa ảnh cũ nếu có
            if ($this->item->image) {
                Storage::disk('public')->delete($this->item->image);
            }
        } else {
            // Nếu không có ảnh mới, giữ lại ảnh cũ
            $validatedData['image'] = $this->item->image;
        }

        $this->item->update($validatedData);

        $this->dispatch('hide-form', ["Sửa thành công!"]);
    }



    public function delete($productId)
    {
        $item = Product::find($productId);
        // Xóa ảnh khỏi storage trước khi xóa sản phẩm
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        $this->dispatch('hide-form', [" Xoá thành công !"]);
        $this->reset();
    }
    public function render()
    {
        $this->categories = Category::all();
        $products = Product::latest()->paginate(10);

        return view('livewire.admin.product.list-products', compact('products'))
            ->layout('layouts.app');
    }
}

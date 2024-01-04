<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Variants;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class ListVariantProduct extends Component
{
    use WithFileUploads;
    public $productId;
    public $categories;
    public $showEditModal = false;
    public $state = [];
    public $color;
    public $size;
    #[Title('Sản phẩm biến thể')]


    public function showModelCreate()
    {
        $this->showEditModal = false;
        $this->dispatch('show-form');
    }

    public function createVariant()
    {
        // Validate the input data
        $validatedData = Validator::make(
            $this->state,
            [
                'size_id' => 'required',
                'color_id' => 'required',
                'price' => 'required|numeric',
                'image' => 'required|image|max:2048', // Adjust image validation as needed
            ],
            [
                'size_id.required' => "Chọn giá trị",
                'color_id.required' => "Chọn giá trị",
                'price.required' => "Nhập giá trị cho biến thể",
                'image.image' => 'Định dạng không hợp lệ, vui lòng chọn một file hình ảnh.',
                'image.mimes' => 'Chỉ chấp nhận các định dạng ảnh: jpeg, png, jpg, gif.',
                'image.max' => 'Dung lượng tối đa cho phép là 2048 KB.',
            ]
        )->validate();

        // Check if the variant with the same color_id and size_id already exists
        $existingVariant = Variants::where('product_id', $this->productId)
            ->where('size_id', $this->state['size_id'])
            ->where('color_id', $this->state['color_id'])
            ->first();

        // Log for debugging
        \Log::info('Existing Variant Check:', [
            'product_id' => $this->productId,
            'size_id' => $this->state['size_id'],
            'color_id' => $this->state['color_id'],
            'existingVariant' => $existingVariant,
        ]);

        if ($existingVariant) {
            $this->dispatch('hide-form');
            $this->dispatch('error', ['Biến thể đã tồn tại ']);

            $this->reset(['state']);

            return;
        }

        // Create the variant
        $variant = new Variants();
        $variant->product_id = $this->productId;
        $variant->size_id = $this->state['size_id'];
        $variant->color_id = $this->state['color_id'];
        $variant->price = $this->state['price'];

        // Handle image upload
        if (isset($this->state['image'])) {
            $imagePath = $this->state['image']->store('variants', 'public');
            $variant->image = $imagePath;
        }

        $variant->save();
        if ($variant->save()) {
            $this->dispatch('hide-form');
            $this->dispatch('success', ['Thêm biến thể thành công']);
            $this->reset(['state']);
        }

        // Reset the form fields
        $this->reset(['state']);
    }




    public function mount($id)
    {
        $this->productId = $id;
    }

    public function render()
    {
        $this->categories = Category::all();
        $this->size = Size::all();
        $this->color = Color::all();

        $product = Product::find($this->productId);
        // dd($product);
        $variants = Variants::where('product_id', $this->productId)->get();
        return view(
            'livewire.admin.product.list-variant-product',
            compact('variants', 'product')
        )->layout('layouts.app');
    }
    public function getCate()
    {
        // Assuming getCate is a method in your Product model
        // You can customize this based on your actual implementation
        if ($this->product) {
            return $this->product->getCate();
        }

        return null;
    }
}

<?php

namespace App\Livewire\Admin\Orders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ListOrders extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $showEditModal = false;
    public $item;
    public $productId;
    public $state = [];
    public $selectedCategory;
    public $statusOrders;

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
                'price' => 'required|numeric',
                'amount' => 'required|numeric',
                'category_id' => 'required|exists:categories,id',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Không bỏ trống vui lòng nhập name',
                'price.required' => 'Không bỏ trống vui lòng nhập giá',
                'amount.required' => 'Không bỏ trống vui lòng nhập số lượng kho hàng',
                'price.numeric' => 'Chỉ nhập số',
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
        $this->dispatch('hide-form');
        $this->dispatch('success', ['Thêm sản phẩm thành công']);
    }
    public function edit(Order $item)
    {
        $this->showEditModal = true;
        $this->item = $item;
        $this->state = $item->toArray();
        $this->dispatch('show-form');
    }

    public function updateStatus()
    {
        $validatedData = Validator::make(
            $this->state,
            [
                'status' => 'required',
            ],
            [
                'status.required' => 'Chọn trạng thái',
            ]
        )->validate();
        $this->item->update($validatedData);
        $this->dispatch('hide-form');
        $this->dispatch('success', ["Thay đổi thành công!"]);
    }

    public function delete($productId)
    {
        $item = Product::find($productId);
        // Xóa ảnh khỏi storage trước khi xóa sản phẩm
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        $this->dispatch('hide-form');
        $this->dispatch('success', [" Xoá thành công !"]);

        $this->reset();
    }
    public function render()
    {
        $this->statusOrders = [
            0 => 'Chờ xác nhận',
            1 => 'Xác nhận',
            2 => 'Đang vận chuyển',
            3 => 'Đã vận chuyển',
        ];
        $orders = Order::with('orderDetails', 'user')->get();
        $data = [];
        foreach ($orders as $order) {
            $userInfo = $order->user;
            $orderDetails = $order->orderDetails;
            foreach ($orderDetails as $orderDetail) {
                $productInfo = $orderDetail->product;
                $data[] = [
                    'user' => $userInfo,
                    'order' => $order,
                    'orderDetail' => $orderDetail,
                    'product' => $productInfo,
                ];
            }
        }
        return view('livewire.admin.orders.list-orders', compact('data'))
            ->layout('layouts.app');
    }
}

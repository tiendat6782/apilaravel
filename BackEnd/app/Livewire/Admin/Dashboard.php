<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {
    }
    public function render()
    {
        $category = Category::count();
        $product = Product::count();
        $order = Order::count();

        $chartLineData = [
            'labels' => ['Thể loại', 'Sản phẩm', 'Đơn hàng'],
            'data' => [$category, $product, $order],
        ];
        return view('livewire.admin.dashboard', compact('chartLineData'))->layout('layouts.app');
    }
}

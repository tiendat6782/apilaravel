<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view(
            'livewire.admin.product.list-products',
            [
                'products' => Product::latest()->paginate(10)
            ]
        )->layout('layouts.app');
    }
}

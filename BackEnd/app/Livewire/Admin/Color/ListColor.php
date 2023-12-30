<?php

namespace App\Livewire\Admin\Color;

use App\Models\Color;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class ListColor extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view(
            'livewire.admin.color.list-color',
            [
                'color' => Color::latest()->paginate(10)

            ]

        )->layout('layouts.app');
    }
}

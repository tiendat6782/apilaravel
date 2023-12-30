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
    public $state = [];
    public $showEditModal = false;
    public $item;
    public $categoryDeleteId;
    public function addCategory()
    {
        $this->showEditModal = false;
        $this->reset();
        $this->dispatch('show-form');
    }

    public function createColor()
    {

        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required|unique:colors',
                'color_code' => 'required|unique:colors',
                'description' => 'required',
            ],
            [
                'name.required' => "Vui lòng nhập, không để trống!",
                'name.unique' => "Màu này đã tồn tại",
                'color_code.required' => "Vui lòng nhập, không để trống!",
                'color_code.unique' => "Mã màu này đã tồn tại",
                'description.required' => "Vui lòng nhập, không để trống!"
            ]
        )->validate();
        Color::create($validatedData);
        $this->dispatch('hide-form', [' Thêm thành công !']);
    }
    public function edit(Color $item)
    {
        $this->showEditModal = true;
        $this->item = $item;
        $this->state = $item->toArray();
        $this->dispatch('show-form');
    }
    public function updateColor()
    {
        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required|unique:colors,name,' . $this->item->id,
                'color_code' => 'required|unique:colors,color_code,' . $this->item->id,
                'description' => 'required',
            ],
            [
                'name.required' => "Vui lòng nhập, không để trống!",
                'name.unique' => "Màu này đã tồn tại",
                'color_code.required' => "Vui lòng nhập, không để trống!",
                'color_code.unique' => "Mã màu này đã tồn tại",
                'description.required' => "Vui lòng nhập, không để trống!"
            ]
        )->validate();

        $this->item->update($validatedData);

        $this->dispatch('hide-form', ["Sửa thành công !"]);
    }


    public function delete($colorId)
    {
        $color = Color::find($colorId);

        $color->delete();
        $this->dispatch('hide-form', [" Xoá thành công !"]);
        $this->reset();
    }
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

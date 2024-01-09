<?php

namespace App\Livewire\Admin\Size;

use App\Models\Size;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Title;

class ListSize extends Component
{


    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $state = [];
    public $showEditModal = false;
    public $item;
    public $categoryDeleteId;
    #[Title('Size')]

    public function showModelCreate()
    {
        $this->showEditModal = false;
        $this->reset();
        $this->dispatch('show-form');
    }

    public function createSize()
    {

        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required|unique:sizes',
                'description' => 'required',
            ],
            [
                'name.required' => "Vui lòng nhập, không để trống!",
                'name.unique' => "Size này đã tồn tại",
                'description.required' => "Vui lòng nhập, không để trống!"
            ]
        )->validate();
        Size::create($validatedData);
        $this->dispatch('hide-form', [' Thêm thành công !']);
    }
    public function edit(Size $item)
    {
        $this->showEditModal = true;
        $this->item = $item;
        $this->state = $item->toArray();
        $this->dispatch('show-form');
    }
    public function updateSize()
    {
        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required|unique:sizes,name,' . $this->item->id,
                'description' => 'required',
            ],
            [
                'name.required' => "Vui lòng nhập, không để trống!",
                'name.unique' => "Size này đã tồn tại",
                'description.required' => "Vui lòng nhập, không để trống!"
            ]
        )->validate();

        $this->item->update($validatedData);

        $this->dispatch('hide-form', ["Sửa thành công !"]);
    }


    public function delete($sizeId)
    {
        $item = Size::find($sizeId);

        $item->delete();
        $this->dispatch('hide-form', [" Xoá thành công !"]);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.size.list-size', [
            'size' => Size::latest()->paginate(10)
        ])->layout('layouts.app');
    }
}

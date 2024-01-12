<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ListCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $state = [];
    public $showEditModal = false;
    public $category;
    public $categoryDeleteId;
    #[Title('Category')]

    public function showModelCreate()
    {
        $this->showEditModal = false;
        $this->reset();
        $this->dispatch('show-form');
    }

    public function createCategory()
    {

        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required|unique:categories',
                'description' => 'required',
            ],
            [
                'name.required' => "Đừng bỏ trống!",
                'name.unique' => "Danh mục này đã tồn tại",
                'description.required' => "Đừng bỏ trống!"
            ]
        )->validate();
        Category::create($validatedData);
        $this->dispatch('hide-form');
        $this->dispatch('success', [' Thêm thành công !']);
    }
    public function edit(Category $category)
    {
        $this->showEditModal = true;
        $this->category = $category;
        $this->state = $category->toArray();
        $this->dispatch('show-form');
    }
    public function updateCategory()
    {
        $validatedData = Validator::make(
            $this->state,
            [
                'name' => 'required|unique:categories,name,' . $this->category->id,
                'description' => 'required',
            ],
            [
                'name.required' => "Đừng bỏ trống!",
                'name.unique' => "Danh mục này đã tồn tại",
                'description.required' => "Đừng bỏ trống!"
            ]
        )->validate();

        $this->category->update($validatedData);

        $this->dispatch('hide-form');
        $this->dispatch('success', [" Sửa thành công !"]);
    }

    public function delete($categoryId)
    {
        $category = Category::find($categoryId);

        $category->delete();
        $this->dispatch('hide-form');
        $this->dispatch('success', [" Xoá thành công !"]);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.category.list-category', [
            'categories' => Category::latest()->paginate(10)
        ])->layout('layouts.app');
    }
}

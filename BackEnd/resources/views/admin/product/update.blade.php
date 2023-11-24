@extends('admin.index')

@section('centent')
<div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
         
            </div>
        </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold">
                            Sửa sản phẩm.
                        </h5>
                        <div class="row align-items-center">
                            {{-- form --}}
                            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating mb-3">
                                    <select name="category_id" id="category_id" class="form-select" aria-label="Category">
                                        <option value="">--Chọn danh mục--</option>
                                        @foreach ($category as $cate)
                                            <option value="{{ $cate->id }}" {{ old('category_id') == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="category_id">Category @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                                    <label for="floatingInput">Tên sản phẩm @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="description" class="form-control" id="floatingPassword" placeholder="Mô tả ngắn">{{ old('description') }}</textarea>
                                    <label for="floatingPassword">Mô tả ngắn @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror</label>
                                </div>
                                <div class="form-floating mb-3">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="file" id="image" name="image" onchange="previewImage()" class="form-control" >
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection
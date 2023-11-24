@extends('admin.index')


@section('content')

<div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h3>Sửa sản phẩm</h3>
                </div>
                <div class="col-6 text-end ">
                    <a href="{{ route('admin.product.index') }}"><i class="ti ti-list fs-5"></i>List</a>
                </div>
            </div>
            <div>
                <table class="table">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Danh mục</th>
                        <td>{{ $product->getCate() }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả ngắn</th>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <th>Ảnh sản phẩm</th>
                        <td>
                            <img src="{{ asset('storage/'.$product->image) }}" alt="" width="50%">
                        </td>
                    </tr>
                </table>
                <div class="text-end">
                    <a href="{{ route('admin.product.destroy',['id' => $product->id]) }}" onclick="return confirm('Bạn có chắc chắn xoá sản phẩm này.')" class="text-danger fs-5"><i class="ti ti-trash"></i></a>
                </div>

            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">
                        Sửa sản phẩm.
                    </h5>
                    <div class="row align-items-center">
                        {{-- form --}}
                        <form action="{{ route('admin.product.update',['id'=> $product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <select name="category_id" id="category_id" class="form-select" aria-label="Category">
                                    <option value="">--Chọn danh mục--</option>
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->id }}" {{ $product->category_id == $cate->id ? 'selected' : '' }}>
                                            {{ $cate->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="category_id">Category @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nhập tên sản phẩm" value="{{$product->name ?? old('name') }}">
                                <label for="floatingInput">Tên sản phẩm @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror </label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" class="form-control" id="floatingPassword" placeholder="Mô tả ngắn">{{$product->description ?? old('description') }}</textarea>
                                <label for="floatingPassword">Mô tả ngắn @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror</label>
                            </div>
                            <div class=" mb-3">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror                    
                                {{-- <input type="hidden" name="image" value="{{ $product->image }}"> --}}
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








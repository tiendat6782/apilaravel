@extends('admin.index')


@section('content')
<div class="row">
  <div class="col-lg-8 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <h3>Danh sách sản phẩm.</h3>
        <div>
            <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Danh mục</th>
                        <th>Sản phẩm</th>
                        <th>Hành động</th>
                    </thead>
                    @php $i = 1 @endphp
                    @isset($product)
                        @if ($product->count()>0)
                          @foreach ($product as $item)
                          <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $item->getCate() }}</td>
                              <td>{{ $item->name }}</td>
                              <td>
                                  {{-- <a href="{{ route('admin.product.edit',['id' => $item->id]) }}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a> --}}
                                  <a href="{{ route('admin.product.destroy',['id' => $item->id]) }}" onclick="return confirm('Bạn có chắc chắn xoá sản phẩm này.')" class="text-danger"><i class="ti ti-trash"></i></a>
                              </td>
                          </tr>
                          @php $i++ @endphp
                          @endforeach
                        @else
                          <tr class="text-center text-danger">
                            <td colspan="4">Không có bản ghi</td>
                          </tr>  
                        @endif
                    @endisset
                </table>
                {{-- <div class="d-flex justify-content-center">
                    {{ $product->links() }}
                </div> --}}
          </div>
        </div>
      </div>
    </div>
  <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
            <!-- Monthly Earnings -->
            <div class="card">
              <div class="card-body">
                <label for="">Image</label>
                  
                  <img id="preview" src="" alt="Image Preview"  class="img-thumbnail" style="display:none;width: 300px;height: 300px;">
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">
                  Thêm sản phẩm.
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
<script>
  function previewImage() {
      var input = document.getElementById('image');
      var preview = document.getElementById('preview');

      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              preview.style.display = 'block';
              preview.src = e.target.result;
          };

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
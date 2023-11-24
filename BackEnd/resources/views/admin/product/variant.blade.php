@extends('admin.index')


@section('content')
<div class="row">
  <div class="col-lg-12 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <h3>Sản phẩm</h3>
          </div>
          <div class="col-6 text-end ">
              <a href="{{ route('admin.product.index') }}"><i class="ti ti-list fs-5"></i>List</a>
          </div>
        </div>
        <div>
          <table class="table">
            <thead>
              <th>Name</th>
              <th>Danh mục</th>
              <th class="d-none d-sm-block">Mô tả</th>
              <th >Ảnh</th>
            </thead>
            <br>
            <tbody class="align-middle">
              <td>{{ $product->name }}</td>
              <td>{{ $product->getCate() }}</td>
              <td>{{ $product->description }}</td>
              <td >
                <img src="{{ asset('storage/'.$product->image) }}" alt="" width="200px" height="200px">
              </td>
              <td>
                <a href="{{ route('admin.product.edit',['id' => $product->id]) }}" class="text-warning me-2"><i class="fa-solid fa-pen-to-square"></i></a>
              </td>
            </tbody>
          </table>
        </div>    
      </div>
    </div>
  </div>
</div>
<h3>Sản phẩm biến thể của giày {{ $product->name }}</h3>
<div class="row">
  <div class="col-lg-8 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <th>#</th>
            <th>Size</th>
            <th>Màu</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Ảnh</th>
            
          </thead>
            @isset($variant)
              @if ($variant->count() > 0)
                @php $i = 1 @endphp
                  @foreach ($variant as $item)
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->getSize() }}</td>
                        <td>{{ $item->getColor() }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                          <img src="{{ asset('storage/'.$item->image) }}" alt="" width="150px" height="150px">
                        </td>
                        <td class="align-middle">
                          <a href="" class="text-warning "><i class="fa-solid fa-pen-to-square"></i></a> <br> <br>
                          <a href="" onclick="return confirm('Bạn có chắc chắn xoá sản phẩm này.')" class="text-danger"><i class="ti ti-trash fs-5"></i></a>
                        </td>
                      </tr>
                    @php $i++ @endphp  
                  @endforeach
              @else
                <tr class="text-danger text-center">
                  <td colspan="6">Không có bản ghi</td>
                </tr>
              @endif
            @endisset
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="row">
      <div class="col-lg-12">
        <!-- Monthly Earnings -->
        <div class="card">
          <div class="card-body">
            <label for="" class="fw-bold">Image</label>
              
              <img id="preview" src="" alt="Image Preview"  class="img-thumbnail" style="display:none;width: 300px;height: 300px;">
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <!-- Yearly Breakup -->
        <div class="card overflow-hidden">
          <div class="card-body p-4">
            <h5 class="card-title mb-9 fw-semibold">
              Thêm sản phẩm biến thể 
            </h5>
            <div class="row align-items-center">
                {{-- form --}}
              <form action="{{ route('variant.store',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="row">
                    <div class="mt-2 col-4">
                      <label for="">Size</label>
                      @error('size_id')
                      <span class="text-danger">{{ $message }}</span><br>
                      @enderror
                      <div class="checkbox-group mt-2">
                        @foreach ($size as $item)
                          <label class="checkbox-label mt-2">
                              <input type="checkbox" name="size_id" class="size-checkbox" value="{{ $item->id }}" {{ old('size_id') == $item->id ? 'checked' : '' }}>
                              {{ $item->name }}
                          </label>
                          <br>
                        @endforeach
                      </div>
                    </div>
                    <div class="mt-2 col-8">
                      <label for="">Color</label>
                      @error('color_id')
                      <span class="text-danger">{{ $message }}</span><br>
                      @enderror
                      <div class="checkbox-group mt-2">
                          @foreach ($color as $item)
                              <label class="checkbox-label mt-2">
                                  <input type="checkbox" name="color_id" class="color-checkbox" value="{{ $item->id }}" {{ old('color_id') == $item->id ? 'checked' : '' }}>
                                  {{ $item->name }}
                              </label>
                              <br>
                          @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="mt-3">
                    @error('image')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="file" id="image" name="image" onchange="previewImage()" class="form-control" >
                  </div>
                  <div class="form-floating mt-3">
                    <input type="text" name="price" class="form-control" id="floatingInput" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                    <label for="floatingInput">Giá sản phẩm @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror </label>
                  </div>
                  <div class="form-floating mt-3">
                    <input type="text" name="quantity" class="form-control" id="floatingInput" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                    <label for="floatingInput">Số lượng sản phẩm @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror </label>
                  </div>
                  <div class="text-center mt-3">
                    <button class="btn btn-outline-success" type="submit">Thêm</button>
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
  document.addEventListener('DOMContentLoaded', function () {
      const sizeCheckboxes = document.querySelectorAll('.size-checkbox');
      const colorCheckboxes = document.querySelectorAll('.color-checkbox');

      sizeCheckboxes.forEach(checkbox => {
          checkbox.addEventListener('change', function () {
              if (this.checked) {
                  sizeCheckboxes.forEach(otherCheckbox => {
                      if (otherCheckbox !== this) {
                          otherCheckbox.checked = false;
                      }
                  });
              }
          });
      });

      colorCheckboxes.forEach(checkbox => {
          checkbox.addEventListener('change', function () {
              if (this.checked) {
                  colorCheckboxes.forEach(otherCheckbox => {
                      if (otherCheckbox !== this) {
                          otherCheckbox.checked = false;
                      }
                  });
              }
          });
      });
  });
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



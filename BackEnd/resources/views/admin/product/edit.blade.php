@extends('admin.index')


@section('content')
<div class="row">
  <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
          @if(session('success') || session('error'))
              <div class="card-body">
                  @php
                      $alertClass = session('success') ? 'alert-success' : 'alert-danger';
                  @endphp
      
                  <div class="alert {{ $alertClass }}">
                      {{ session('success') ?? session('error') }}
                  </div>
                  
                  <script>
                      setTimeout(function() {
                          var alertDiv = document.querySelector('.alert');
                          if (alertDiv) {
                              alertDiv.style.display = 'none';
                          }
                      }, 4000);
                  </script>
              </div>
          @endif
      </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <h3>Sản phẩm biến thể</h3>
          </div>
          <div class="col-6 text-end ">
              <a href="{{ route('product.variant',['id'=>$product->id]) }}"><i class="ti ti-list fs-5"></i>List</a>
          </div>
        </div>
        <div>
            <table class="table">
                <thead>
                  <th>Size</th>
                  <th>Màu</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Ảnh</th>
                  
                </thead>
                  <tr class="align-middle">
                    <td>{{ $variant->getSize() }}</td>
                    <td>{{ $variant->getColor() }}</td>
                    <td>{{ $variant->price }}</td>
                    <td>{{ $variant->quantity }}</td>
                    <td>
                      <img src="{{ asset('storage/'.$variant->image) }}" alt="" width="150px" height="150px">
                    </td>
                    <td>
                      <a href="" onclick="return confirm('Bạn có chắc chắn xoá sản phẩm này.')" class="text-danger"><i class="ti ti-trash fs-5"></i></a>
                    </td>
                  </tr>          
              </table>
        </div>    
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-8 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title mb-9 fw-semibold">
            Sửa sản phẩm biến thể 
        </h5>
        <div class="row align-items-center">
            {{-- form --}}
            <form action="{{ route('variant.update', ['id' => $product->id, 'variantId' => $variant->id]) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="">
                  <div class="">
                      <label for="size">Size</label>
                      @error('size_id')
                      <span class="text-danger">{{ $message }}</span><br>
                      @enderror
                      <div class="radio-group mt-2">
                          @foreach ($size as $item)
                              <label class="radio-label me-3">
                                  <input type="radio" name="size_id" class="size-radio" value="{{ $item->id }}" {{ old('size_id', $variant->size_id) == $item->id ? 'checked' : '' }}>
                                  {{ $item->name }}
                              </label>
                          @endforeach
                      </div>
                  </div>
                  <div class="">
                      <label for="color">Color</label>
                      @error('color_id')
                      <span class="text-danger">{{ $message }}</span><br>
                      @enderror
                      <div class="radio-group mt-2">
                          @foreach ($color as $item)
                              <label class="radio-label me-3">
                                  <input type="radio" name="color_id" class="color-radio" value="{{ $item->id }}" {{ old('color_id', $variant->color_id) == $item->id ? 'checked' : '' }}>
                                  {{ $item->name }}
                              </label>
                          @endforeach
                      </div>
                  </div>
              </div>
              <div class="mt-3">
                  @error('image')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <input type="file" id="image" name="image" onchange="previewImage()" class="form-control">
              </div>
              <div class="form-floating mt-3">
                  <input type="text" name="price" class="form-control" id="floatingInputPrice" placeholder="Nhập tên sản phẩm" value="{{ $variant->price ?? old('price') }}">
                  <label for="floatingInputPrice">Giá sản phẩm @error('price')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror </label>
              </div>
              <div class="form-floating mt-3">
                  <input type="text" name="quantity" class="form-control" id="floatingInputQuantity" placeholder="Nhập tên sản phẩm" value="{{ $variant->quantity ?? old('quantity') }}">
                  <label for="floatingInputQuantity">Số lượng sản phẩm @error('quantity')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror </label>
              </div>
              <div class="text-center mt-3">
                  <button class="btn btn-outline-success" type="submit">Sửa</button>
              </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <b>Image</b>
              <img id="preview" src="" alt="Image Preview"  class="img-thumbnail" style="display:none;width: 300px;height: 300px;">
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



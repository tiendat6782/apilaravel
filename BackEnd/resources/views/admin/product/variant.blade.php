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
                      <tr class="align-middle">
                        <td>{{ $i }}</td>
                        <td>{{ $item->getSize() }}</td>
                        <td>{{ $item->getColor() }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                          <img src="{{ asset('storage/'.$item->image) }}" alt="" width="150px" height="150px">
                        </td>
                        <td class="align-middle">
                          <a href="{{ route('variant.edit',['id' => $product->id, 'variantId' => $item->id]) }}" class="text-warning "><i class="fa-solid fa-pen-to-square"></i></a> <br> <br>
                          <a href="{{ route('variant.delete', ['id' => $product->id, 'variantId' => $item->id]) }}" onclick="return confirm('Bạn có chắc chắn xoá biến thể  này.')" class="text-danger"><i class="ti ti-trash fs-5"></i></a>
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
              <b>Image</b>              
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
                      <b>Size</b>
                      @error('size_id')
                      <span class="text-danger">{{ $message }}</span><br>
                      @enderror
                      <div class="checkbox-group mt-2">
                        @foreach ($size as $item)
                          <label class="checkbox-label mt-2">
                              <input type="radio" name="size_id" class="size-checkbox" value="{{ $item->id }}" {{ old('size_id') == $item->id ? 'checked' : '' }}>
                              {{ $item->name }}
                          </label>
                          <br>
                        @endforeach
                      </div>
                    </div>
                    <div class="mt-2 col-8">
                      <b>Color</b>
                      @error('color_id')
                      <span class="text-danger">{{ $message }}</span><br>
                      @enderror
                      <div class="checkbox-group mt-2">
                          @foreach ($color as $item)
                              <label class="checkbox-label mt-2">
                                  <input type="radio" name="color_id" class="color-checkbox" value="{{ $item->id }}" {{ old('color_id') == $item->id ? 'checked' : '' }}>
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
                    <input type="text" name="price" class="form-control" id="floatingInputPrice" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                    <label for="floatingInputPrice">Giá sản phẩm @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror </label>
                  </div>
                  <div class="form-floating mt-3">
                    <input type="text" name="quantity" class="form-control" id="floatingInputQuantity" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                    <label for="floatingInputQuantity">Số lượng sản phẩm @error('quantity')
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



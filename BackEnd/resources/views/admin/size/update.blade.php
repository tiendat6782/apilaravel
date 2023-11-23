@extends('admin.index')


@section('content')
<div class="row">
    
    <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <h3>Sửa size</h3>
            <div>
                
                    <table class="table">
                        <thead>
                            <th>Tên size</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </thead>
                            <tr>
                                <td>{{ $size->name }}</td>
                                <td>{{ $size->description }}</td>
                                <td>
                                <a href="{{ route('admin.size.destroy',['id' => $size->id]) }}" onclick="return confirm('Bạn có chắc chắn xoá size này.')" class="text-danger"><i class="ti ti-trash"></i></a>

                                </td>
                            </tr>
                    </table>
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
                  Sửa size.
                </h5>
                <div class="row align-items-center">
                    {{-- form --}}
                 <form action="{{ route('admin.size.update',['id'=>$size->id]) }}" method="post" >
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nhập tên size" value="{{ $size->name ?? old('name') }}">
                        <label for="floatingInput">Tên size @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror </label>
                      </div>
                      <div class="form-floating">
                        <textarea name="description" class="form-control" id="floatingPassword" placeholder="Mô tả ngắn">{{ old('description', $size->description) }}</textarea>
                        <label for="floatingPassword">Mô tả ngắn @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror</label>
                      </div>
                      <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Sửa</button>
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
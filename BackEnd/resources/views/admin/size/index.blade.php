@extends('admin.index')


@section('content')
<div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <h3>Danh sách size.</h3>
            <div>
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Size</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </thead>
                    @php $i = 1 @endphp
                    @isset($size)
                        @if ($size->count()>0)
                          @foreach ($size as $item)
                            <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->description }}</td>
                              <td>
                                  <a href="{{ route('admin.size.edit',['id' => $item->id]) }}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                  <a href="{{ route('admin.size.destroy',['id' => $item->id]) }}" onclick="return confirm('Bạn có chắc chắn xoá size này.')" class="text-danger"><i class="ti ti-trash"></i></a>
                              </td>
                            </tr>
                            @php $i++ @endphp
                          @endforeach
                        @else
                            <tr class="text-danger text-center">
                                <td colspan="4">Không có bản ghi</td>
                            </tr>
                        @endif
                    @endisset
                </table>
                {{-- <div class="d-flex justify-content-center">
                    {{ $size->links() }}
                </div> --}}
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
            
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">
                  Thêm size.
                </h5>
                <div class="row align-items-center">
                    {{-- form --}}
                 <form action="{{ route('admin.size.store') }}" method="post" >
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nhập tên size" value="{{ old('name') }}">
                        <label for="floatingInput">Tên size @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror </label>
                      </div>
                      <div class="form-floating">
                        <textarea name="description" class="form-control" id="floatingPassword" placeholder="Mô tả ngắn">{{ old('description') }}</textarea>
                        <label for="floatingPassword">Mô tả ngắn @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror</label>
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
<div>
    <div class="card w-100">
        <div class="card-body">
          <div class="row">
              <div class="col-6">
                 <h3>Danh sách sản phẩm.</h3>
              </div>
              <div class="col-6 text-end">
                 <button wire:click.prevent="showModelCreate" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</button>
              </div>
          </div>
          <div>
              <table class="table table-striped">
                  <thead>
                      <th>#</th>
                      <th>Tên sản phẩm</th>
                      <th>Mã màu</th>
                      <th>Mô tả</th>
                      {{-- <th class="text-center">Hành động</th> --}}
                  </thead>
                    @isset($products)
                        @if ($products->count()>0)
                          @php $i = 1 @endphp
                          @foreach ($products as $item)
                              <tr>
                                  <td>{{ $i }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="lỗi ảnh" width="200px">
                                  </td>
                                  <td>{{ $item->description }}</td>
                                  {{-- <td class="text-center">
                                      <a  href="" wire:click.prevent="edit({{ $item }})" class="text-warning me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                      <a href="" wire:click.prevent="delete({{ $item->id }})" onclick="return confirm('Bạn có chắc chắn xoá sản phẩm này.')" class="text-danger"><i class="ti ti-trash"></i></a>
                                  </td> --}}
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
              <div class="d-flex justify-content-center fs-1">
                  {{ $products->links() }}
              </div>
          </div>
        </div>
      </div>
</div>

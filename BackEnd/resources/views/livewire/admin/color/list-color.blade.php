<div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fa fa-check-circle me-1"></i> {{ session('message') }} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        
        <div class="card w-100">
          <div class="card-body">
            <div class="row">
                <div class="col-6">
                   <h3>Danh sách màu sắc.</h3>
                </div>
                <div class="col-6 text-end">
                   <button wire:click.prevent="addCategory" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i> Thêm màu</button>
                </div>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>màu sắc</th>
                        <th>Mô tả</th>
                        <th class="text-center">Hành động</th>
                    </thead>
                      @isset($color)
                          @if ($color->count()>0)
                            @php $i = 1 @endphp
                            @foreach ($color as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td class="text-center">
                                        <a  href="" wire:click.prevent="edit({{ $item }})" class="text-warning me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="" wire:click.prevent="delete({{ $item->id }})" onclick="return confirm('Bạn có chắc chắn xoá màu sắc này.')" class="text-danger"><i class="ti ti-trash"></i></a>
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
                <div class="d-flex justify-content-center fs-1">
                    {{ $color->links() }}
                </div>
            </div>
          </div>
        </div>
    
    
    
       <!-- Modal -->
       
    </div>
</div>

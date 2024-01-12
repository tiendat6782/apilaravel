<div>
    <div class="card w-100">
          <div class="card-body">
            <div class="row">
                <div class="col-6">
                   <h3>Danh sách Size.</h3>
                </div>
                <div class="col-6 text-end">
                   <button wire:click.prevent="showModelCreate" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i> Thêm size</button>
                </div>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Size</th>
                        <th>Mô tả</th>
                        <th class="text-center">Hành động</th>
                    </thead>
                      @isset($size)
                          @if ($size->count()>0)
                            @php $i = 1 @endphp
                            @foreach ($size as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td class="text-center">
                                        <a  href="" wire:click.prevent="edit({{ $item }})" class="text-warning me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="" wire:click.prevent="delete({{ $item->id }})" onclick="return confirm('Bạn có chắc chắn xoá Size này.')" class="text-danger"><i class="ti ti-trash"></i></a>
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
                    {{ $size->links() }}
                </div>
            </div>
          </div>
        </div>
    
    
    
       <!-- Modal -->
        <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                @if ($showEditModal)
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa size</h1>
                @else
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm size</h1>
                @endif

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateSize' : 'createSize'}}">
                    
                    <div class="modal-body">
                        <div class="form-floating mb-1">
                            <input type="text" wire:model.defer="state.name" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Nhập tên Size" value="{{ old('name') }}">
                            <label for="floatingInput">Tên Size</label>
                          </div>
                          @error('name')
                            <span class="text-danger ">
                                {{ $message }}
                            </span>
                          @enderror
                         
                          <div class="form-floating mt-3">
                            <textarea wire:model.defer="state.description" name="description" class="form-control @error('description') is-invalid @enderror" id="floatingPassword" placeholder="Mô tả ngắn">{{ old('description') }}</textarea>
                            <label for="floatingPassword">Mô tả ngắn</label>
                            @error('description')
                                <span class="text-danger ">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-xmark me-1"></i>Cancel</button>
                        @if ($showEditModal )
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save me-1"></i> Save changes</button>
                        @else
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save me-1"></i> Save</button>
                        @endif
                    </div>
                </form>
    
            </div>
            </div>
        </div>
    </div>
</div>

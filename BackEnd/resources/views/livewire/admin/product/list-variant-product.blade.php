<div>
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h3>Sản phẩm</h3>
                    </div>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th class="col-6">Mô tả</th>
                        </thead>
                        <br>
                        <tbody class="align-middle">
                            @if(isset($product))
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->getCate() }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="" width="200px" height="200px">
                                </td>
                                <td>{{ $product->description }}</td>

                            @else
                                <td colspan="4">Sản phẩm không tồn tại.</td>
                            @endif
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
    <button wire:click.prevent="showModelCreate" class="btn btn-secondary"><i class="fa-solid fa-plus"></i> Thêm biến thế</button>



    {{-- modal --}}
    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($showEditModal)
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa sản phẩm biến thể</h1>
                    @else
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm sản phẩm biến thể</h1>
                    @endif
    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateVariant' : 'createVariant'}}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mt-2 col-6">
                                <b>Size</b>
                                @error('size_id')
                                <span class="text-danger">{{ $message }}</span><br>
                                @enderror
                                <div class="checkbox-group mt-2">
                                    @foreach ($size as $item)
                                        <label class="checkbox-label mt-2">
                                            <input type="radio" wire:model.defer="state.size_id" class="size-checkbox" value="{{ $item->id }}" {{ old('size_id') == $item->id ? 'checked' : '' }}>
                                            {{ $item->name }}
                                        </label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-2 col-6">
                                <b>Color</b>
                                @error('color_id')
                                <span class="text-danger">{{ $message }}</span><br>
                                @enderror
                                <div class="checkbox-group mt-2">
                                    @foreach ($color as $item)
                                        <label class="checkbox-label mt-2">
                                            <input type="radio" wire:model.defer="state.color_id" class="color-checkbox" value="{{ $item->id }}" {{ old('color_id') == $item->id ? 'checked' : '' }}>
                                            {{ $item->name }}
                                        </label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
    
                        <div class="form-floating mb-1 mt-3">
                            <input type="text" wire:model.defer="state.price" class="form-control @error('price') is-invalid @enderror" id="floatingInput" placeholder="Nhập tên màu sắc">
                            <label for="floatingInput">Giá</label>
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="mb-1 mt-3">
                            <input type="file" wire:model.defer="state.image" class="form-control @error('image') is-invalid @enderror" id="floatingImage" accept="image/*">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-xmark me-1"></i>Cancel</button>
                        @if ($showEditModal)
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

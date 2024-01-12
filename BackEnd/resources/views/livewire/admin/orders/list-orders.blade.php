<div>
    <div class="card w-100">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h3>Danh sách đặt hàng</h3>
                </div>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Người đặt hàng</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Hành động</th>
                    </thead>
                    @isset($data)
                        @if (count($data) > 0)
                            @php $i = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item['user']->name }}</td>
                                    <td>{{ $item['product']->name }}</td>
                                    <td>{{ $item['orderDetail']->quantity }}</td>
                                    <td>
                                        @if ($item['order']->status === 0)
                                            Chờ xác nhận
                                        @elseif ($item['order']->status === 1)
                                            Xác nhận
                                        @elseif ($item['order']->status === 2)
                                            Đang vận chuyển
                                        @elseif ($item['order']->status === 3)
                                            Đã vận chuyển
                                        @else
                                            Unknown Status
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="" wire:click.prevent="edit({{ json_encode($item) }})"
                                            class="text-warning me-2"><i class="fa-solid fa-pen-to-square"></i></a>
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
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($showEditModal)
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thay đổi trạng thái đơn hàng</h1>
                    @else
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm đơn hàng</h1>
                    @endif

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateStatus' : 'createProduct' }}">
                    <div class="modal-body">
                        <div class="mb-1 mt-3">
                            <select wire:model.defer="state.status" id="status" class="form-select"
                                aria-label="Status">
                                <option value="">--Chọn trạng thái--</option>
                                @foreach ($statusOrders as $statusId => $statusName)
                                    <option value="{{ $statusId }}">{{ $statusName }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="text-danger ">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                class="fa fa-xmark me-1"></i>Cancel</button>
                        @if ($showEditModal)
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save me-1"></i> Save
                                changes</button>
                        @else
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save me-1"></i>
                                Save</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

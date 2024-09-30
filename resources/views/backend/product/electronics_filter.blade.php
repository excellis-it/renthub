

@foreach($data as $item)
<tr>
    <td>{{$item->product_name}}</td>
    <td>{{$item->product_price}}</td>
    <td >
        @if($item->product_status == 1)
            <span style="color: green;font-weight: bold;">Active</span>
        @else
            <span style="color: red;font-weight: bold;">In-Active</span>
        @endif
    </td>
    <td>
        <div class="d-flex order-actions">
            @if(Auth::user()->role == "vendor")
            <a href="{{ URL::to('vendor/electronics/edit/'.$item->product_id) }}"
                data-bs-target="#editProductModal-{{ $item->product_id }}">
                <i class='bx bxs-edit edit-icon' style="color:#44c6a9"></i>
            </a>

            <a href="#" class="ms-3" data-bs-toggle="modal"
                data-bs-target="#exampleDangerModal-{{ $item->product_id }}">
                <i class='bx bxs-trash'></i>
            </a>

            <div class="modal fade" id="exampleDangerModal-{{ $item->product_id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Are you sure you want to delete this electronic?</h5>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button
                                onclick="window.location.replace('{{URL::to('vendor/electronics/remove/'.$item->product_id)}}');"
                                class="btn btn-danger">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="6">
        <div class="d-flex justify-content-between align-items-center">
            <div>{!! $data->links('vendor.pagination.bootstrap-4') !!}</div>
            <div>(Showing {{ $data->firstItem() }} – {{ $data->lastItem() }} of {{ $data->total() }} properties)</div>
        </div>
    </td>
</tr>

@foreach($user_machinery_enquries as $machinery_enqury)
<tr>
    <td>
        <img alt="..." src="{{ asset('public/images/'.$machinery_enqury->product->product_thumbnail) }}"
            class="avatar avatar-xs rounded-circle me-2" width="30px" height="30px">
    </td>
    <!--<td></td>-->
    <td>{{ $machinery_enqury->product->product_name ?? 'N/A' }}</td>
    <td>{{ $machinery_enqury->product->manufacture_date ?? 'N/A'}}</td>
    <td>{{$machinery_enqury->product->product_price ?? 'N/A' }}</td>
    <td>{{$machinery_enqury->product->vendor->first_name ?? 'N/A'}}</td>
    <td>{{$machinery_enqury->product->product_type ?? 'N/A'}}</td>
    <td class="text-end">
        <a href="{{ route('machineries-details', Crypt::encrypt($machinery_enqury->product_id)) }}" class="view_icon">
            <i class="fa-solid fa-eye"></i>
        </a>
        {{-- <a  class="delete_icon" data-id="{{ $machinery_enqury->id }}" data-url="{{ route('user-delete-enquiry') }}">
            <i class="fa-solid fa-trash"></i>
        </a> --}}
    </td>
</tr>

@endforeach

<tr>
    <td colspan="7">
        <div class="d-flex justify-content-between align-items-center">
            <div>{!! $user_machinery_enquries->links('vendor.pagination.bootstrap-4') !!}</div>
            <div>(Showing {{ $user_machinery_enquries->firstItem() }} – {{ $user_machinery_enquries->lastItem() }} of {{
                $user_machinery_enquries->total() }} machineries)</div>
        </div>
    </td>
</tr>
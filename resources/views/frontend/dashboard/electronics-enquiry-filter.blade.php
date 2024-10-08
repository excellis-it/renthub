@foreach($user_electronics_enquries as $electronics_enquries)
<tr>
    <td>
        <img alt="..." src="{{ asset('public/images/'.$electronics_enquries->product->product_thumbnail) }}"
        class="avatar avatar-xs rounded-circle me-2" width="30px"
            height="30px">
    </td>  
    <!--<td></td>-->
    <td>{{ $electronics_enquries->product->product_name ?? 'N/A' }}</td>
    <td>{{ $electronics_enquries->product->product_type ?? 'N/A'}}</td>
    <td>{{$electronics_enquries->product->product_price ?? 'N/A' }}</td>
    <td>{{$electronics_enquries->product->vendor->first_name ?? 'N/A'}}</td>
    <td>{{$electronics_enquries->product->manufacture_date ?? 'N/A'}}</td>
    <td class="text-end">
        <a href="{{ URL::to('electronics-home-appliances-details/' . $electronics_enquries->product_id) }}" class="view_icon">
            <i class="fa-solid fa-eye"></i>
        </a>
        <a href="#" class="delete_icon" data-id="{{ $electronics_enquries->id }}" data-url="{{ route('user-delete-enquiry') }}">
            <i class="fa-solid fa-trash"></i>
        </a>
    </td>
</tr>

@endforeach

<tr>
<td colspan="7">
    <div class="d-flex justify-content-between align-items-center">
        <div>{!! $user_electronics_enquries->links('vendor.pagination.bootstrap-4') !!}</div>
        <div>(Showing {{ $user_electronics_enquries->firstItem() }} – {{ $user_electronics_enquries->lastItem() }} of {{ $user_electronics_enquries->total() }} properties)</div>
    </div>
</td>
</tr>
@foreach($user_vehicles_enquries as $vehicle_enqury)
<tr>
    <td>
        <img alt="..." src="{{ asset('public/images/'.$vehicle_enqury->product->product_thumbnail) }}"
        class="avatar avatar-xs rounded-circle me-2" width="30px"
            height="30px">
    </td>  
    <!--<td></td>-->
    <td>{{ $vehicle_enqury->product->product_name ?? 'N/A' }}</td>
    <td>{{ $vehicle_enqury->product->product_type ?? 'N/A'}}</td>
    <td>{{$vehicle_enqury->product->product_price ?? 'N/A' }}</td>
    <td>{{$vehicle_enqury->product->vendor->first_name ?? 'N/A'}}</td>
    <td>{{$vehicle_enqury->product->vehicle_km ?? 'N/A'}} Km</td>
    <td class="text-end">
        <a href="{{ route('vehicle-details', Crypt::encrypt($vehicle_enqury->product_id)) }}" class="view_icon">
            <i class="fa-solid fa-eye"></i>
        </a>
        {{-- <a href="#" class="delete_icon" data-id="{{ $vehicle_enqury->id }}" data-url="{{ route('user-delete-enquiry') }}">
            <i class="fa-solid fa-trash"></i>
        </a> --}}
    </td>
</tr>

@endforeach

<tr>
<td colspan="7">
    <div class="d-flex justify-content-between align-items-center">
        <div>{!! $user_vehicles_enquries->links('vendor.pagination.bootstrap-4') !!}</div>
        <div>(Showing {{ $user_vehicles_enquries->firstItem() }} – {{ $user_vehicles_enquries->lastItem() }} of {{ $user_vehicles_enquries->total() }} vehicles)</div>
    </div>
</td>
</tr>
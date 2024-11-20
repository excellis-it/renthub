    @foreach($user_property_enquries as $property_enqury)
        <tr>
            <td>
                <img alt="..." src="{{ asset('public/images/'.$property_enqury->product->product_thumbnail) }}"
                class="avatar avatar-xs rounded-circle me-2" width="30px"
                    height="30px">
            </td>  
            <!--<td></td>-->
            <td>{{ $property_enqury->product->product_name ?? '' }}</td>
            <td>{{ $property_enqury->product->product_type }}</td>
            <td>{{$property_enqury->product->product_price ?? '' }}</td>
            <td>{{$property_enqury->product->vendor->first_name ?? ''}}</td>
            <td>{{$property_enqury->product->property_size ?? ''}}</td>
            <td class="text-end">
                <a href="{{ route('property-details', $property_enqury->product_id) }}" class="view_icon">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <a href="#" class="delete_icon" data-id="{{ $property_enqury->id }}" data-url="{{ route('user-delete-enquiry') }}">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </td>
        </tr>

    @endforeach

    <tr>
        <td colspan="7">
            <div class="d-flex justify-content-between align-items-center">
                <div>{!! $user_property_enquries->links('vendor.pagination.bootstrap-4') !!}</div>
                <div>(Showing {{ $user_property_enquries->firstItem() }} – {{ $user_property_enquries->lastItem() }} of {{ $user_property_enquries->total() }} properties)</div>
            </div>
        </td>
    </tr>
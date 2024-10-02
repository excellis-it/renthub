

@foreach($user_property_enquries as $user_property_enqury)
<tr>
    <td>{{ $user_property_enqury->user->first_name ?? 'N/A' }} {{ $user_property_enqury->user->last_name ?? 'N/A' }}</td>
    <td>{{ $user_property_enqury->user->email ?? 'N/A' }}</td>
    <td>{{ $user_property_enqury->user->phone_number ?? 'N/A' }}</td>
    <td>{{ $user_property_enqury->message ?? 'N/A' }}</td>
    <td>{{ $user_property_enqury->tour_date ?? 'N/A' }}</td>
    <td>{{ $user_property_enqury->product->product_name ?? 'N/A' }}</td>
    <td>{{ $user_property_enqury->product->marked_price ?? 'N/A' }}</td>
    <td>{{ $user_property_enqury->product->vendor->first_name ?? '' }} {{ $user_property_enqury->product->vendor->last_name ?? '' }}</td>

    {{-- <td></td> --}}
</tr>
@endforeach
<tr>
    <td colspan="8">
        <div class="d-flex justify-content-between align-items-center">
            <div>{!! $user_property_enquries->links('vendor.pagination.bootstrap-4') !!}</div>
            <div>(Showing {{ $user_property_enquries->firstItem() }} – {{ $user_property_enquries->lastItem() }} of {{ $user_property_enquries->total() }} properties)</div>
        </div>
    </td>
</tr>

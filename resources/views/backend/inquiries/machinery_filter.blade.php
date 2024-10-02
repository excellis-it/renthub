

@foreach($user_machinery_enquries as $user_machinery_enqury)
<tr>
    <td>{{ $user_machinery_enqury->user->first_name ?? 'N/A' }} {{ $user_machinery_enqury->user->last_name ?? 'N/A' }}</td>
    <td>{{ $user_machinery_enqury->user->email ?? 'N/A' }}</td>
    <td>{{ $user_machinery_enqury->user->phone_number ?? 'N/A' }}</td>
    <td>{{ $user_machinery_enqury->message ?? 'N/A' }}</td>
    <td>{{ $user_machinery_enqury->product->product_name ?? 'N/A' }}</td>
    <td>{{ $user_machinery_enqury->product->marked_price ?? 'N/A' }}</td>
    <td>{{ $user_machinery_enqury->product->vendor->first_name ?? '' }} {{ $user_machinery_enqury->product->vendor->last_name ?? '' }}</td>

    {{-- <td></td> --}}
</tr>
@endforeach
<tr>
    <td colspan="8">
        <div class="d-flex justify-content-between align-items-center">
            <div>{!! $user_machinery_enquries->links('vendor.pagination.bootstrap-4') !!}</div>
            <div>(Showing {{ $user_machinery_enquries->firstItem() }} – {{ $user_machinery_enquries->lastItem() }} of {{ $user_machinery_enquries->total() }} properties)</div>
        </div>
    </td>
</tr>

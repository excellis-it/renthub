@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
@endphp
@if ($user_property_enquries->count() > 0)
@foreach ($user_property_enquries as $user_property_enqury)
    <tr>
        <td>{{ $user_property_enqury->user->first_name ?? 'N/A' }} {{ $user_property_enqury->user->last_name ?? 'N/A' }}
        </td>
        <td>{{ $user_property_enqury->user->email ?? 'N/A' }}</td>
        <td>{{ $user_property_enqury->user->phone_number ?? 'N/A' }}</td>
        <td>{{ Str::limit($user_property_enqury->message ?? 'N/A', 10) }}</td>
        <td>{{ $user_property_enqury->tour_date ?? 'N/A' }}</td>
        <td>{{ $user_property_enqury->product->product_name ?? 'N/A' }}</td>
        <td>{{ $user_property_enqury->product->marked_price ?? 'N/A' }}</td>
        @if ($role == 'admin')
            <td>{{ $user_property_enqury->product->vendor->first_name ?? '' }}
                {{ $user_property_enqury->product->vendor->last_name ?? '' }}</td>
        @endif
       
        {{-- <td></td> --}}
    </tr>
@endforeach
<tr>
    <td colspan="8">
        <div class="d-flex justify-content-between align-items-center">
            <div>{!! $user_property_enquries->links('vendor.pagination.bootstrap-4') !!}</div>
            <div>(Showing {{ $user_property_enquries->firstItem() }} – {{ $user_property_enquries->lastItem() }} of
                {{ $user_property_enquries->total() }} properties)</div>
        </div>
    </td>
</tr>
@else
    <tr>
        <td colspan="8" class="text-center">No data found</td>
    </tr>
@endif

@php 
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
@endphp

@if ($user_vehicle_enquries->count() > 0)
@foreach($user_vehicle_enquries as $user_vehicle_enqury)
<tr>
    <td>{{ $user_vehicle_enqury->user->first_name ?? 'N/A' }} {{ $user_vehicle_enqury->user->last_name ?? 'N/A' }}</td>
    <td>{{ $user_vehicle_enqury->user->email ?? 'N/A' }}</td>
    <td>{{ $user_vehicle_enqury->user->phone_number ?? 'N/A' }}</td>
    <td>{{ Str::limit($user_vehicle_enqury->message ?? 'N/A', 10) }}</td>
    <td>{{ $user_vehicle_enqury->tour_date ?? 'N/A' }}</td>
    <td>{{ $user_vehicle_enqury->product->product_name ?? 'N/A' }}</td>
    <td>{{ $user_vehicle_enqury->product->marked_price ?? 'N/A' }}</td>
    @if($role=='admin')
    <td>{{ $user_vehicle_enqury->product->vendor->first_name ?? '' }} {{ $user_vehicle_enqury->product->vendor->last_name ?? '' }}</td>
    @endif

    {{-- <td></td> --}}
</tr>
@endforeach
<tr>
    <td colspan="8">
        <div class="d-flex justify-content-between align-items-center">
            <div>{!! $user_vehicle_enquries->links('vendor.pagination.bootstrap-4') !!}</div>
            <div>(Showing {{ $user_vehicle_enquries->firstItem() }} – {{ $user_vehicle_enquries->lastItem() }} of {{ $user_vehicle_enquries->total() }} properties)</div>
        </div>
    </td>
</tr>
@else
    <tr>
        <td colspan="8" class="text-center">No data found</td>
    </tr>
@endif
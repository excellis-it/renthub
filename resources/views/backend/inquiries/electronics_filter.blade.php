@php 
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
@endphp

@if ($user_electronics_enquries->count() > 0)
@foreach($user_electronics_enquries as $user_electronics_enqury)
<tr>
    <td>{{ $user_electronics_enqury->user->first_name ?? 'N/A' }} {{ $user_electronics_enqury->user->last_name ?? 'N/A' }}</td>
    <td>{{ $user_electronics_enqury->user->email ?? 'N/A' }}</td>
    <td>{{ $user_electronics_enqury->user->phone_number ?? 'N/A' }}</td> 
    <td>{{ Str::limit($user_electronics_enqury->message ?? 'N/A', 10) }}</td>
    <td>{{ $user_electronics_enqury->product->product_name ?? 'N/A' }}</td>
    <td>{{ $user_electronics_enqury->product->product_type ?? 'N/A' }}</td>
    <td>{{ $user_electronics_enqury->product->marked_price ?? 'N/A' }}</td>
    @if($role=='admin')
    <td>{{ $user_electronics_enqury->product->vendor->first_name ?? '' }} {{ $user_electronics_enqury->product->vendor->last_name ?? '' }}</td>
    @endif

    {{-- <td></td> --}}
</tr>
@endforeach
<tr>
    <td colspan="8">
        <div class="d-flex justify-content-between align-items-center">
            <div>{!! $user_electronics_enquries->links('vendor.pagination.bootstrap-4') !!}</div>
            <div>(Showing {{ $user_electronics_enquries->firstItem() }} – {{ $user_electronics_enquries->lastItem() }} of {{ $user_electronics_enquries->total() }} properties)</div>
        </div>
    </td>
</tr>
@else
    <tr>
        <td colspan="8" class="text-center">No data found</td>
    </tr>
@endif
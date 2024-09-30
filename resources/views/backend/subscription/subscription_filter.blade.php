@if(count($subscriptions)>0)
    @foreach($subscriptions as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{strtoupper($item->subscription->title)}}</td>
        <td>{{ number_format($item->subscription->price, 2) }}</td>
        <td>{{$item->subscription->days}}</td>
        <td>{{date('jS F, Y',strtotime($item->start_date))}}</td>
        <td>{{date('jS F, Y',strtotime($item->end_date))}}</td>
        <td>

            <select style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; width:100%;">
                <option value="1" @if($item->status == 1) selected @endif style="color:
                    green;">Active</option>
                <option value="2" @if($item->status == 2) selected @endif style="color:
                    blue;">Renewal</option>
                <option value="3" @if($item->status == 3) selected @endif style="color: red;">Cancel
                </option>
            </select>
        </td>
    </tr>

    @endforeach
    <tr>
        <td colspan="7">
            <div class="d-flex justify-content-between align-items-center">
                <div>{!! $subscriptions->links('vendor.pagination.bootstrap-4') !!}</div>
                <div>(Showing {{ $subscriptions->firstItem() }} – {{ $subscriptions->lastItem() }} of {{ $subscriptions->total() }} subscriptions)</div>
            </div>
        </td>
    </tr>
    @else
    <tr>
        <td colspan="7">No Data available</td>
    </tr>
    @endif
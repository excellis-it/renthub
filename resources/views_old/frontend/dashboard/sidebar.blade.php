<div class="card border-0 shadow py-4">
    <div class="text-center">

        <img src="{{ $user->photo ? asset('uploads/images/profile/'.$user->photo) : asset('frontend_assets/assets/images/admin-logo.jpg') }}"
            class="card-img-top rounded-circle w-50 shadow" alt="...">

        <div class="card-body">
            <h5 class="card-title"> <b>{{ $user->first_name }} {{ $user->last_name }}</b></h5>
        </div>
    </div>

    <div class="list-group ">
        <a href="{{ URL::to('/user/profile') }}" class="list-group-item list-group-item-action" aria-current="true">
            <i class="fa-solid fa-home"></i> Dashboard
        </a>
        <a href="{{ Route('user-enquiry-product', 1) }}"
            class="list-group-item list-group-item-action {{ Request::routeIs('user-enquiry-product') ? 'active' : '' }}"
            aria-current="true">
            <i class="fa-solid fa-hotel"></i> Property Inquiries
        </a>
        <a href="{{ Route('user-enquiry-machinery', 2) }}"
            class="list-group-item list-group-item-action {{ Request::routeIs('user-enquiry-machinery') ? 'active' : '' }}"
            aria-current="true">
            <i class="fa-solid fa-screwdriver-wrench"></i> Machinery Inquiries
        </a>
        <a href="{{ Route('user-enquiry-electronics', 3) }}"
            class="list-group-item list-group-item-action {{ Request::routeIs('user-enquiry-electronics') ? 'active' : '' }}"
            aria-current="true">
            <i class="fa-solid fa-camera"></i> Electronic Inquiries
        </a>
        <a href="{{ Route('user-enquiry-vehicles', 4) }}"
            class="list-group-item list-group-item-action {{ Request::routeIs('user-enquiry-vehicles') ? 'active' : '' }}"
            aria-current="true">
            <i class="fa-solid fa-car"></i> Vehicle Inquiries
        </a>
        <a href="{{ route('user-edit') }}"
            class="list-group-item list-group-item-action {{ Request::routeIs('user-edit') ? 'active' : '' }}"> <i
                class="fa-solid fa-id-card-clip"></i>
            Update Profile</a>

        <a href="{{ route('user-change-password') }}" class="list-group-item list-group-item-action {{ Request::routeIs('user-change-password') ? 'active' : '' }}"><i
                class="fa-solid fa-key"></i> Change
            Password</a>

        <a href="{{ URL::to('/logout') }}" class="list-group-item list-group-item-action"> <i
                class="fa-solid fa-right-from-bracket" onclick="event.preventDefault(); this.closest
                ('form').submit();"></i>
            Logout</a>
    </div>

</div>


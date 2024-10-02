@php
use Illuminate\Support\Facades\Auth;
$role = Auth::user()->role;
$status = Auth::user()->status;
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend_assets') }}/images/logo-img.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">RENT HUB</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">User</li>
        <li>
            <a href="{{ route($role . '-profile') }}" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
        </li>

        @if ($status)
        @if ($role == 'admin')
        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='lni lni-checkmark-circle'></i>
                </div>
                <div class="menu-title">Brands</div>
            </a>
            <ul>
                <li> <a href="{{ route('brand') }}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                </li>

                <li> <a href="{{ route('brand-add') }}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a></li>

            </ul>
        </li>

        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='lni lni-folder'></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
            <ul>
                <li> <a href="{{ route('category') }}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                </li>
                <li> <a href="{{ route('category-add') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='lni lni-dinner'></i>
                </div>
                <div class="menu-title">Sub Categories</div>
            </a>
            <ul>
                <li> <a href="{{ route('sub-category') }}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                </li>
                <li> <a href="{{ route('sub-category-add') }}"><i class="bx bx-right-arrow-alt"></i>Add Sub
                        Category</a>
                </li>
            </ul>
        </li>
        @endif
        @if ($role == 'vendor')
        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='lni lni-graph'></i></div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li><a href="{{ URL::to('/vendor/property/list') }}" class="submenu-item"><i
                            class="bx bx-right-arrow-alt"></i>Property</a></li>
                <li><a href="{{ URL::to('/vendor/machinery/list') }}" class="submenu-item"><i
                            class="bx bx-right-arrow-alt"></i>Equipment & Machineries</a></li>
                <li><a href="{{ URL::to('/vendor/electronics/list') }}" class="submenu-item"><i
                            class="bx bx-right-arrow-alt"></i>Electronics & Home Appliances</a></li>
                <li><a href="{{ URL::to('/vendor/vehicle/list') }}" class="submenu-item"><i
                            class="bx bx-right-arrow-alt"></i>Vehicles</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-package"></i>
                </div>
                <div class="menu-title">Subscription</div>
            </a>
            <ul>
                <li> <a href="{{ route('vendor-vendor-list') }}" class="submenu-item"><i
                            class="bx bx-right-arrow-alt"></i>Purchase Plan
                    </a>
                </li>
                <li> <a href="{{ route('vendor-subscription-history') }}" class="submenu-item"><i
                            class="bx bx-right-arrow-alt"></i>History
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if ($role == 'admin')

        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='lni lni-wallet'></i>
                </div>
                <div class="menu-title">Coupons</div>
            </a>
            <ul>
                <li> <a href="{{ route($role . '-coupon') }}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                </li>
                <li> <a href="{{ route('vendor-coupon-add') }}"><i class="bx bx-right-arrow-alt"></i>Add
                        Coupon</a>
                </li>
            </ul>
        </li>


        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-user"></i>
                </div>
                <div class="menu-title">User</div>
            </a>
            <ul>
                <li> <a href="{{ URL::to('admin/user/listing_user') }}"><i class="bx bx-right-arrow-alt"></i>Listing
                        User</a>
                </li>
                <li> <a href="{{ URL::to('admin/user/basic_user') }}"><i class="bx bx-right-arrow-alt"></i>Basic
                        User</a>
                </li>
            </ul>

        </li>
        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-package"></i>
                </div>
                <div class="menu-title">Subscription Plan</div>
            </a>
            <ul>
                <li> <a href="{{ URL::to('admin/subscription/list') }}"><i class="bx bx-right-arrow-alt"></i>Show
                        All</a>
                </li>
                <li> <a href="{{ URL::to('admin/subscription/add') }}"><i class="bx bx-right-arrow-alt"></i>Add
                        Plan</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-package"></i>
                </div>
                <div class="menu-title">Inquiries</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin-inquiries-property-list') }}"><i class="bx bx-right-arrow-alt"></i>Properties</a></li>
                <li> <a href="{{ route('admin-inquiries-machinery-list') }}"><i class="bx bx-right-arrow-alt"></i>Machinery</a></li>
                <li> <a href="{{ route('admin-inquiries-vehicle-list') }}"><i class="bx bx-right-arrow-alt"></i>Vehicle</a></li>
                <li> <a href="{{ route('admin-inquiries-electronics-list') }}"><i class="bx bx-right-arrow-alt"></i>Electronics</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-comments-reply"></i>
                </div>
                <div class="menu-title">Testimonials</div>
            </a>
            <ul>
                <li> <a href="{{ URL::to('admin/testimonial/list') }}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                </li>
                <li> <a href="{{ URL::to('admin/testimonial/add') }}"><i class="bx bx-right-arrow-alt"></i>Add
                        Testimonials</a>
                </li>
            </ul>

        </li>

        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-pagination"></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>
            <ul>
                <li> <a href="{{ URL::to('admin/slider/list') }}"><i class="bx bx-right-arrow-alt"></i>Show
                        All</a>
                </li>
                <li> <a href="{{ URL::to('admin/slider/add') }}"><i class="bx bx-right-arrow-alt"></i>Add
                        Slider</a>
                </li>
            </ul>

        </li>

        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-pagination"></i>
                </div>
                <div class="menu-title">Pages</div>
            </a>
            <ul>
                <li> <a href="{{ URL::to('admin/pages/list') }}"><i class="bx bx-right-arrow-alt"></i>Show
                        All</a>
                </li>
                <li> <a href="{{ URL::to('admin/pages/add') }}"><i class="bx bx-right-arrow-alt"></i>Add
                        Pages</a>
                </li>
            </ul>

        </li>
        @endif

        @endif

        <li>
            <form action="{{ URL::to('/logout') }}">
                @csrf
                <a href="{{ URL::to('/logout') }}" aria-expanded="false" onclick="event.preventDefault(); this.closest
                ('form').submit();">
                    <div class="parent-icon"><i class="bx bx-log-out-circle"></i>
                    </div>
                    <div class="menu-title">Logout</div>
                </a>
            </form>

        </li>

    </ul>
    <!--end navigation-->
</div>
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
            <a href="{{URL::to('/')}}"><h4 class="logo-text">RENT HUB</h4></a>
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
        <li class="submenu {{ Request::is('admin/brands/*') || Route::currentRouteName() == 'brand' || Route::currentRouteName() == 'brand-add' ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='lni lni-checkmark-circle'></i></div>
                <div class="menu-title">Brands</div>
            </a>
            <ul style="display: {{ Request::is('admin/brands/*') || Route::currentRouteName() == 'brand' || Route::currentRouteName() == 'brand-add' ? 'block' : 'none' }};">
                <li class="{{ Route::currentRouteName() == 'brand' ? 'active' : '' }}">
                    <a href="{{ route('brand') }}">
                        <i class="bx bx-right-arrow-alt"></i>Show All
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == 'brand-add' ? 'active' : '' }}">
                    <a href="{{ route('brand-add') }}">
                        <i class="bx bx-right-arrow-alt"></i>Add Brand
                    </a>
                </li>
            </ul>
        </li>


        <li class="submenu {{ Request::is('admin/categories/*') || Route::currentRouteName() == 'category' || Route::currentRouteName() == 'category-add' ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='lni lni-folder'></i></div>
                <div class="menu-title">Categories</div>
            </a>
            <ul style="display: {{ Request::is('admin/categories/*') || Route::currentRouteName() == 'category' || Route::currentRouteName() == 'category-add' ? 'block' : 'none' }};">
                <li class="{{ Route::currentRouteName() == 'category' ? 'active' : '' }}">
                    <a href="{{ route('category') }}">
                        <i class="bx bx-right-arrow-alt"></i>Show All
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == 'category-add' ? 'active' : '' }}">
                    <a href="{{ route('category-add') }}">
                        <i class="bx bx-right-arrow-alt"></i>Add Category
                    </a>
                </li>
            </ul>
        </li>

        <li class="submenu {{ Request::is('admin/sub-categories/*') || Route::currentRouteName() == 'sub-category' || Route::currentRouteName() == 'sub-category-add' ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='lni lni-dinner'></i></div>
                <div class="menu-title">Sub Categories</div>
            </a>
            <ul style="display: {{ Request::is('admin/sub-categories/*') || Route::currentRouteName() == 'sub-category' || Route::currentRouteName() == 'sub-category-add' ? 'block' : 'none' }};">
                <li class="{{ Route::currentRouteName() == 'sub-category' ? 'active' : '' }}">
                    <a href="{{ route('sub-category') }}">
                        <i class="bx bx-right-arrow-alt"></i>Show All
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == 'sub-category-add' ? 'active' : '' }}">
                    <a href="{{ route('sub-category-add') }}">
                        <i class="bx bx-right-arrow-alt"></i>Add Sub Category
                    </a>
                </li>
            </ul>
        </li>

        @endif
        @if ($role == 'vendor')

        <li class="submenu {{ Request::is('vendor/property/list') || Request::is('vendor/machinery/list') || Request::is('vendor/electronics/list') || Request::is('vendor/vehicle/list') ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-graph"></i></div>
                <div class="menu-title">Products</div>
            </a>
            <ul style="display: {{ Request::is('vendor/property/list') || Request::is('vendor/machinery/list') || Request::is('vendor/electronics/list') || Request::is('vendor/vehicle/list') ? 'block' : 'none' }};">
                <li class="{{ Request::is('vendor/property/list') ? 'active' : '' }}">
                    <a href="{{ URL::to('/vendor/property/list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Property
                    </a>
                </li>
                <li class="{{ Request::is('vendor/machinery/list') ? 'active' : '' }}">
                    <a href="{{ URL::to('/vendor/machinery/list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Equipment & Machineries
                    </a>
                </li>
                <li class="{{ Request::is('vendor/electronics/list') ? 'active' : '' }}">
                    <a href="{{ URL::to('/vendor/electronics/list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Electronics & Home Appliances
                    </a>
                </li>
                <li class="{{ Request::is('vendor/vehicle/list') ? 'active' : '' }}">
                    <a href="{{ URL::to('/vendor/vehicle/list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Vehicles
                    </a>
                </li>
            </ul>
        </li>


        <li class="submenu {{ Request::is('vendor/inquiries/*') ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-package"></i></div>
                <div class="menu-title">Inquiries</div>
            </a>
            <ul style="display: {{ Request::is('vendor/inquiries/*') ? 'block' : 'none' }};">
                <li class="{{ Request::is('vendor/inquiries/property-list') ? 'active' : '' }}">
                    <a href="{{ route('vendor-inquiries-property-list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Properties
                    </a>
                </li>
                <li class="{{ Request::is('vendor/inquiries/machinery-list') ? 'active' : '' }}">
                    <a href="{{ route('vendor-inquiries-machinery-list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Machinery
                    </a>
                </li>
                <li class="{{ Request::is('vendor/inquiries/vehicle-list') ? 'active' : '' }}">
                    <a href="{{ route('vendor-inquiries-vehicle-list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Vehicle
                    </a>
                </li>
                <li class="{{ Request::is('vendor/inquiries/electronics-list') ? 'active' : '' }}">
                    <a href="{{ route('vendor-inquiries-electronics-list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Electronics
                    </a>
                </li>
            </ul>
        </li>

        <li class="submenu {{ Request::is('vendor/subscription/*') ? 'active' : '' }}">
        <a class="has-arrow" style="cursor: pointer">
            <div class="parent-icon"><i class="lni lni-dollar"></i></div>
            <div class="menu-title">Subscription</div>
        </a>
        <ul style="display: {{ Request::is('vendor/subscription/*') ? 'block' : 'none' }};">
            <li class="{{ Request::is('vendor/purchase-plan') ? 'active' : '' }}">
                <a href="{{ route('vendor-vendor-list') }}">
                    <i class="bx bx-right-arrow-alt"></i>Purchase Plan
                </a>
            </li>
            <li class="{{ Request::is('vendor/subscription-history/*') ? 'active' : '' }}">
                <a href="{{ route('vendor-subscription-history') }}">
                    <i class="bx bx-right-arrow-alt"></i>History
                </a>
            </li>
        </ul>
        </li>



        @endif

        @if ($role == 'admin')

        <li class="submenu {{ Request::is('admin/coupons/*') || Route::currentRouteName() == $role.'-coupon' || Route::currentRouteName() == 'vendor-coupon-add' ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='lni lni-wallet'></i></div>
                <div class="menu-title">Coupons</div>
            </a>
            <ul style="display: {{ Request::is('admin/coupons/*') || Route::currentRouteName() == $role.'-coupon' || Route::currentRouteName() == 'vendor-coupon-add' ? 'block' : 'none' }};">
                <li class="{{ Route::currentRouteName() == $role.'-coupon' ? 'active' : '' }}">
                    <a href="{{ route($role . '-coupon') }}">
                        <i class="bx bx-right-arrow-alt"></i>Show All
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == 'vendor-coupon-add' ? 'active' : '' }}">
                    <a href="{{ route('vendor-coupon-add') }}">
                        <i class="bx bx-right-arrow-alt"></i>Add Coupon
                    </a>
                </li>
            </ul>
        </li>


        <li class="submenu {{ Request::is('admin/user/*') ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer" onclick="toggleMenu(this)">
                <div class="parent-icon"><i class="lni lni-user"></i></div>
                <div class="menu-title">User</div>
            </a>
            <ul style="display: {{ Request::is('admin/user/*') ? 'block' : 'none' }};">
                <li class="{{ Request::is('admin/user/listing_user') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/user/listing_user') }}">
                        <i class="bx bx-right-arrow-alt"></i>Listing User
                    </a>
                </li>
                <li class="{{ Request::is('admin/user/basic_user') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/user/basic_user') }}">
                        <i class="bx bx-right-arrow-alt"></i>Basic User
                    </a>
                </li>
            </ul>
        </li>



        <li class="submenu {{ Request::is('admin/subscription/*') ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-dollar"></i></div>
                <div class="menu-title">Subscription Plan</div>
            </a>
            <ul style="display: {{ Request::is('admin/subscription/*') ? 'block' : 'none' }};">
                <li class="{{ Request::is('admin/subscription/list') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/subscription/list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Show All
                    </a>
                </li>
                <li class="{{ Request::is('admin/subscription/add') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/subscription/add') }}">
                        <i class="bx bx-right-arrow-alt"></i>Add Plan
                    </a>
                </li>
                <li class="{{ Request::is('admin/subscription/history') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/subscription/history') }}">
                        <i class="bx bx-right-arrow-alt"></i>History
                    </a>
                </li>
            </ul>
        </li>


        <li class="submenu {{ Request::is('admin/inquiries/*') ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-package"></i></div>
                <div class="menu-title">Inquiries</div>
            </a>
            <ul style="display: {{ Request::is('admin/inquiries/*') ? 'block' : 'none' }};">
                <li class="{{ Request::is('admin/inquiries/property-list') ? 'active' : '' }}">
                    <a href="{{ route('admin-inquiries-property-list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Properties
                    </a>
                </li>
                <li class="{{ Request::is('admin/inquiries/machinery-list') ? 'active' : '' }}">
                    <a href="{{ route('admin-inquiries-machinery-list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Machinery
                    </a>
                </li>
                <li class="{{ Request::is('admin/inquiries/vehicle-list') ? 'active' : '' }}">
                    <a href="{{ route('admin-inquiries-vehicle-list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Vehicle
                    </a>
                </li>
                <li class="{{ Request::is('admin/inquiries/electronics-list') ? 'active' : '' }}">
                    <a href="{{ route('admin-inquiries-electronics-list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Electronics
                    </a>
                </li>
            </ul>
        </li>


        <li class="submenu {{ Request::is('admin/home/*') ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-home"></i></div>
                <div class="menu-title">Home</div>
            </a>
            <ul style="display: {{ Request::is('admin/home/*') ? 'block' : 'none' }};">
                <li class="{{ Request::is('admin/home/index') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/home/index') }}">
                        <i class="bx bx-right-arrow-alt"></i>Update
                    </a>
                </li>
            </ul>
        </li>


        <li class="submenu {{ Request::is('admin/testimonial/*') ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-comments-reply"></i></div>
                <div class="menu-title">Testimonials</div>
            </a>
            <ul style="display: {{ Request::is('admin/testimonial/*') ? 'block' : 'none' }};">
                <li class="{{ Request::is('admin/testimonial/list') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/testimonial/list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Show All
                    </a>
                </li>
                <li class="{{ Request::is('admin/testimonial/add') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/testimonial/add') }}">
                        <i class="bx bx-right-arrow-alt"></i>Add Testimonials
                    </a>
                </li>
            </ul>
        </li>


        <li class="submenu {{ Request::is('admin/slider/*') ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-pagination"></i></div>
                <div class="menu-title">Slider</div>
            </a>
            <ul style="display: {{ Request::is('admin/slider/*') ? 'block' : 'none' }};">
                <li class="{{ Request::is('admin/slider/list') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/slider/list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Show All
                    </a>
                </li>
                <li class="{{ Request::is('admin/slider/add') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/slider/add') }}">
                        <i class="bx bx-right-arrow-alt"></i>Add Slider
                    </a>
                </li>
            </ul>
        </li>


        <li class="submenu {{ Request::is('admin/pages/*') ? 'active' : '' }}">
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class="lni lni-folder"></i></div>
                <div class="menu-title">Pages</div>
            </a>
            <ul style="display: {{ Request::is('admin/pages/*') ? 'block' : 'none' }};">
                <li class="{{ Request::is('admin/pages/list') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/pages/list') }}">
                        <i class="bx bx-right-arrow-alt"></i>Show All
                    </a>
                </li>
                <li class="{{ Request::is('admin/pages/add') ? 'active' : '' }}">
                    <a href="{{ URL::to('admin/pages/add') }}">
                        <i class="bx bx-right-arrow-alt"></i>Add Pages
                    </a>
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

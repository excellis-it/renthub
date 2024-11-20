@php use App\MyHelpers;use Illuminate\Support\Facades\Auth; @endphp
@extends('backend.layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">

<!--end breadcrumb -->
<section class="subscription_page">
   <div class="container">
      <div class="row mb-5">

         <div class="col-lg-12">
            <div class="heading_hp mb-3">
               <h2>Subscription Plans for Rent Hub:</h2>
            </div>
         </div>
         <div class="col-lg-12">
            <div id="">
               <!--price tab-->
               <div class="row">
                  @if(count($value) > 0)
                  @foreach($value as $val)
                  <div class="col-xl-3 col-lg-6">
                     <div class="plan">
                           <div class="plan-inner">
                              <div class="entry-title">
                                 <h3>{{ $val->title }}</h3>
                                 <h6>{{ $val->subtitle }}</h6>
                                 <div class="price">
                                       <p>${{ $val->price }}</p>
                                 </div>
                              </div>
                              <div class="entry-content">
                                 <h5>Features:</h5>
                                 <ul>
                                       <li>{!! $val->description !!}</li>
                                 </ul>
                                 <h5>Best For:</h5>
                                 <ul>
                                       <li>{{ $val->days }} Days</li>
                                 </ul>
                              </div>
                              <div class="text-center">
                                 <a href="{{URL::to('privacy-policy')}}" target="_blank">Terms and Condition</a>
                              </div>
                              <div class="subscri">
                                 @php
                                         $checking= App\Models\SubscriptionHistoryModel::where(['vendor_id'=>Auth::id(),'status'=>1,'subscription_id'=>$val->id])->first();                                         
                                 @endphp
                                
                                       @if ($checking)
                                          <a href="javascript:void(0);" class="red_btn" style="pointer-events: none; opacity: 0.5;">
                                                <span>Subscribed </span>
                                          </a>
                                       @else
                                          <a href="{{ route('vendor.paypal-payment.create', Crypt::encrypt($val->id)) }}" class="red_btn">
                                                <span>Subscribe </span>
                                          </a>
                                       @endif
                                
                              </div>
                           </div>
                     </div>
                  </div>
                  @endforeach
               @else
                  <p>No subscriptions found</p>
               @endif

               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
@section('plugins')
<link href="{{asset('backend_assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('js')
<script src="{{asset('backend_assets')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('backend_assets')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>

<script src="sweetalert2.all.min.js"></script>


@section('AjaxScript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
   integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>



@endsection



@endsection
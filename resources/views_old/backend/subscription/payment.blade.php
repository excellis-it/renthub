@extends('backend.layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@section('PaymentTitle', 'Payment')
@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="d-flex align-items-center mb-3">Payment</h4>
            <form id="subcription_form" action="{{ url('vendor/payment-create') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Card Holder</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="card_holder" type="text" class="form-control @error('card_holder') is-invalid @enderror"
                            placeholder="Enter Card Holder" />
                       
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Card Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="card_number" type="number" class="form-control @error('card_number') is-invalid @enderror"
                            placeholder="Enter Card Number" />
                       
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Expiry Date</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="expiry_date" type="date"
                            class="form-control @error('expiry_date') is-invalid @enderror" placeholder="Enter Expiry Date" rows="3">
                           
                        
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">CVV</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="cvv" type="number" class="form-control @error('cvv') is-invalid @enderror"
                            placeholder="Enter CVV" />
                       
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/custom.js"></script>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection
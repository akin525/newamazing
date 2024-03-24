@extends('layouts.sidebar')
@section('tittle', 'Fund Wallet')
@section('content')
    <div class="col-lg-12">
        <div class="loading-overlay" id="loadingSpinner1" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="product-add global-shadow px-sm-30 py-sm-50 px-0 py-20 bg-white radius-xl w-100 mb-40">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-lg-10">
                    <div class="mx-sm-30 mx-20 ">

                        <div class="card add-product p-sm-30 p-20 mb-30">
                            <div class="card-body p-0">
                                <div class="card-header">
                                    <h6 class="fw-500">Fund Wallet with Card</h6>
                                </div>

                                <div class="add-product__body px-sm-40 px-20">
                                    <form style="padding-left: 30px;" class="text-center">
                                        <div class="text-left" style="color:red; font-family: Verdana; font-size: 30px;">Fund Wallet</div>
                                        @foreach($data2 as $data)
                                            <div class='card'>
                                             <strong>Notification: </br></strong><b class='align-content-center'>Note that ₦{{$data->charges}} will be charged On every Funding</b></div>
                                               <strong>Notification: </br></strong><b class='align-content-center'>Note that ₦{{$data->len}}  is the Minimum Funding Amount</b>
                                        <div class="row text-center">
                                            <div class="col-lg-4">
                                                <input type="hidden" id="email-address" value="{{Auth::user()->email}}" class="form-control" required /><br>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="amount">Amount</label>
                                                <input type="tel" id="amount" min="{{$data->len}}" maxlength="4" class="form-control" required /><br>
                                            </div>
                                            @endforeach
                                        </div>
                                        <center>
                                        <div class="col-lg-4">
                                            <div class="form-submit">
                                                <button type="button" onclick="SquadPay()" class="btn btn-danger">Fund Now</button>
                                                <br/>
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#fund">Fund With Transfer</button>
                                            </div>
                                        </div>
                                        </center>
                                            <div class="modal fade" id="fund">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
                                                        <div class="loading-spinner"></div>
                                                    </div>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Account Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                            </button>
                                                        </div>

                                                        @if(Auth::user()->bank==null)
                                                            <center>
                                                                <button type="button" class="btn btn-primary text-center">Generate Account Number</button>
                                                            </center>
                                                        @else
                                                            <div class="basic-list-group">
                                                                <div class="list-group"><a href="javascript:void(0);" class="list-group-item list-group-item-action active">Account
                                                                        Number </a><a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                                                        {{Auth::user()->account_number}}</a>
                                                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action disabled">
                                                                        Account Name
                                                                    </a> <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{Auth::user()->account_name}}</a>
                                                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action active">
                                                                        Bank
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{Auth::user()->bank}}</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            {{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://checkout.squadco.com/widget/squad.min.js"></script>
<script>
    function SquadPay() {

    const squadInstance = new squad({
    onClose: () => console.log("Widget closed"),
    onLoad: () => console.log("Widget loaded successfully"),
    onSuccess: () => console.log(`Linked successfully`),
    key: "pk_debcbc76a126689ea56e1e3a8b089e9153cae17c",
    //Change key (test_pk_sample-public-key-1) to the key on your Squad Dashboard
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    //Enter amount in Naira or Dollar (Base value Kobo/cent already multiplied by 100)
    currency_code: "NGN"
    });
    squadInstance.setup();
    squadInstance.open();

    }
</script>
@endsection

@extends('layouts.sidebar')
@section('tittle', 'Dashboard')
@section('content')
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <div class="col-xxl-12 mb-25">
        <marquee>Update:: {{$me->message}}.</marquee>
        <div class="card banner-feature--18 d-flex">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card-body px-25">
                            <h1 class="banner-feature__heading color-white">{{$greet}} {{Auth::user()->username}}</h1>
                            <p class="banner-feature__para color-white">
                               Notification:  Welcome Back!!
                            </p>
                            <div class="d-flex justify-content-sm-start justify-content-center">
                                @if(Auth::user()->apikey ==null)
                                <a href="#" class="btn btn-danger m-2">Customer</a>
                                <a href="{{route('reseller')}}" class="btn btn-success">Upgrade</a>
                                @else
                                <a href="#" class="btn btn-danger m-2">Reseller</a>
                                <a href="#" class="btn btn-success">Upgraded!</a>
                                @endif


                            </div>
                            <a href="https://play.google.com/store/apps/details?id=com.a5starcompany.bytebase " target="_blank"><img width="200" src="{{asset('play.png')}}"/> Download </a>

                        </div>

                    </div>
                    <div class="col-xl-6">
                        <div class="banner-feature__shape px-md-25 px-25 py-sm-0 pt-15 pb-30 d-flex justify-content-sm-end justify-content-center">
                            <img src="{{asset('img/demo5-banner.png')}}" alt="img" class="svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
{{--    Wallet Section--}}
    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <div class="feature-cards5 d-flex justify-content-between border-0 radius-xl p-25">
            <div class="application-task d-flex align-items-center">
                <div class="application-task-icon wh-60 bg-success content-center">
                    <img class="svg" src="img/svg/feature-cards11.svg" alt="">
                </div>
                <div class="application-task-content">
                    <h4>₦{{number_format(intval(Auth::user()->wallet *1),2)}}</h4>
                    <span class="text-light fs-14 mt-1 text-capitalize">Wallet Balance</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <div class="feature-cards5 d-flex justify-content-between border-0 radius-xl p-25">
            <div class="application-task d-flex align-items-center">
                <div class="application-task-icon wh-60 bg-secondary content-center">
                    <img class="svg" src="img/svg/feature-cards11.svg" alt="">
                </div>
                <div class="application-task-content">
                    <h4>₦{{number_format(intval($totalrefer *1),2)}}</h4>
                    <span class="text-light fs-14 mt-1 text-capitalize">Referal Bonus</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <div class="feature-cards5 d-flex justify-content-between border-0 radius-xl p-25">
            <a href="{{route('fund')}}">
            <div class="application-task d-flex align-items-center">
                <div class="application-task-icon wh-60 bg-secondary content-center">
                    <img class="svg" src="img/svg/feature-cards9.svg" alt="">
                </div>
                <div class="application-task-content">
                    <h4>Fund Wallet</h4>
                    <span class="text-light fs-14 mt-1 text-capitalize">Click hear</span>
                </div>
            </div>
            </a>
        </div>
    </div>

    <div class="col-md-7 col-lg-6">
        <div class="card">
            <canvas id="transactionChart" width="800" height="500"></canvas>
        </div>
    </div>
    <div class="col-md-7 col-lg-6">
        <div class="card">
            <canvas id="transactionChart1" width="800" height="500"></canvas>
        </div>
    </div>

    <div class="col-xxl-4 col-lg-6 mb-25">
        <div class="card border-0 chartLine-po-details h-100">

            <div class="card-body">
                <div class="wp-chart">
                    <div class="parentContainer">
                        <br>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <h6>Your Referal Link</h6>
                                <!-- The text field -->
                                <input id="myInput" type="text" class="form-control" value="https://bytebase.com.ng/register?refer={{$user->username}}" >

                                <!-- The button used to copy the text -->
                                <button class="btn btn-info" onclick="myFunction()">Copy Referral Link</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

    </style>

    <script>
        function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            alert( copyText.value);
        }
    </script>


    <div class="col-xxl-4 col-lg-6 mb-25">
        <div class="card border-0 chartLine-po-details h-100">
<br>
<br>
            <div class="card-body">
                <div class="wp-chart">
                    <div class="parentContainer">
                        <div >
                            @if (Auth::user()->account_number==1 && Auth::user()->account_name==1)
                                <a href='{{route('vertual')}}' class='btn btn-primary'>Click this section to get your  Virtual Bank Account</a>
                            @else
                                <div class="">
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <ul style="list-style-type:square">
                                                <h4>Your Virtual Bank Account</h4>

                                                {{--                                                    <li class="text-white"><h6 class="text-white"><b>Personal Virtual Account Number</b></h6></li>--}}
                                                {{--                                                    <br>--}}
                                                <li class='text-info'><h6 class="text-info"><b>Name:{{Auth::user()->account_name}}</b></h6></li>
                                                <li class='text-info'><h6 class="text-info"><b>Account No:{{Auth::user()->account_number}}</b></h6></li>
                                                @if(Auth::user()->bank==null)
                                                <li class='text-info'><h6 class="text-info"><b>Bank:WEMA-BANK</b></h6></li>
                                                @else
                                                    <li class='text-info'><h6 class="text-info"><b>Bank:{{Auth::user()->bank}}</b></h6></li>
                                                @endif
                                                    {{--                                                    <br>--}}
                                                {{--                                                    <li class='text-white'><h6 class="text-white"><b>Note: All virtual funding are being set automatically</b></h6></li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

{{--Product section--}}
    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25" >
        <div class="feature-cards5 d-flex justify-content-between border-0 radius-xl p-25">
            <a href="{{route('airtime')}}">
            <div class="application-task d-flex align-items-center">
                <div class="application-task-icon wh-60 bg-primary content-center">
                    <i class="fa fa-phone text-white"></i>
                </div>
                <div class="application-task-content">
                    <h4>Buy Airtime</h4>
                    <span class="text-light fs-14 mt-1 text-capitalize">MTN | AIRTEL | 9MOBILE | GLO</span>
                </div>
            </div>
            </a>
        </div>
    </div>


    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <a href="{{route('select')}}">
        <div class="feature-cards5 d-flex justify-content-between border-0 radius-xl p-25">
            <div class="application-task d-flex align-items-center">
                <div class="application-task-icon wh-60 bg-success content-center">
                    <I class="fa fa-network-wired text-white"></I>
                </div>
                <div class="application-task-content">
                    <h4>Buy Data</h4>
                    <span class="text-light fs-14 mt-1 text-capitalize">MTN | AIRTEL | 9MOBILE | GLO</span>
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <a href="{{route('jamb')}}">
        <div class="feature-cards5 d-flex justify-content-between border-0 radius-xl p-25">
            <div class="application-task d-flex align-items-center">
                <div class="application-task-icon wh-60 bg-success content-center">
                    <I class="fa fa-network-wired text-white"></I>
                </div>
                <div class="application-task-content">
                    <h4>Jamb E-pin</h4>
                    <span class="text-light fs-14 mt-1 text-capitalize">JAMB</span>
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <a href="{{route('de')}}">
        <div class="feature-cards5 d-flex justify-content-between border-0 radius-xl p-25">
            <div class="application-task d-flex align-items-center">
                <div class="application-task-icon wh-60 bg-success content-center">
                    <I class="fa fa-network-wired text-white"></I>
                </div>
                <div class="application-task-content">
                    <h4>Jamb Direct Entry</h4>
                    <span class="text-light fs-14 mt-1 text-capitalize">JAMB</span>
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <div class="feature-cards5 d-flex justify-content-between border-0 radius-xl p-25">
            <div class="application-task d-flex align-items-center">
                <div class="application-task-icon wh-60 bg-dark content-center">
                    <i class="fa fa-bookmark text-white"></i>
                </div>
                <div class="application-task-content">
                    <h4>Cable Subscription</h4>
                    <span class="text-light fs-14 mt-1 text-capitalize">GOTV | DSTV | STARTIME</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <a href="{{url('waec')}}">
        <figure class="feature-cards4">
            <img class="svg" src="{{asset('waec.png')}}" alt="">
            <figcaption>
                <h2>WAEC Result Checker</h2>
                <p>Buy WAEC Result Pin</p>
            </figcaption>
        </figure>
        </a>
    </div>

    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <a href="{{url('neco')}}">
        <figure class="feature-cards4">
            <img class="svg" src="{{asset('neco.jpg')}}" alt="">
            <figcaption>
                <h2>NECO Result Token</h2>
                <p>Buy NECO Result Token</p>
            </figcaption>
        </figure>
        </a>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
        <figure class="feature-cards4">
            <img class="svg" src="{{asset('nabteb.png')}}" alt="">
            <figcaption>
                <h2>NABTEB Result Checker</h2>
                <p>Buy NABTEB Result Checker</p>
            </figcaption>
        </figure>
    </div>

@endsection
@section('script')
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                Swal.fire({
                    title: 'Hi {{Auth::user()->username}}',
                    text: '{{$me->message}}',
                    icon: 'info'
                });
            }, 1000); // 5000                                         milliseconds = 5 seconds
        }) ;
    </script>
    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to buy airtime of ₦' + document.getElementById("amount").value + ' on ' + document.getElementById("number").value +' ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // The user clicked "Yes", proceed with the action
                        // Add your jQuery code here
                        // For example, perform an AJAX request or update the page content
                        $('#loadingSpinner').show();

                        $.ajax({
                            url: "{{ route('buyairtime') }}",
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                // Handle the success response here
                                $('#loadingSpinner').hide();

                                console.log(response);
                                // Update the page or perform any other actions based on the response

                                if (response.status == 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: response.message
                                    }).then(() => {
                                        // location.reload(); // Reload the page
                                        window.location.href = "{{ url('viewpdf') }}/" + response.id;                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Pending',
                                        text: response.message
                                    });
                                    // Handle any other response status
                                }

                            },
                            error: function(xhr) {
                                $('#loadingSpinner').hide();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'fail',
                                    text: xhr.responseText
                                });
                                // Handle any errors
                                console.log(xhr.responseText);

                            }
                        });

                    }
                });
            });
        });

    </script>

    <script>
        fetch('/transaction')
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('transactionChart').getContext('2d');

                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: 'Deposit Amount',
                            data: data.amounts,
                            backgroundColor: 'rgba(53, 169, 21, 0.5)',
                            borderColor: 'rgba(53, 169, 21, 1)',
                            borderWidth: 1,
                            fill: 'origin' // Fill the area below the line

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('/transaction1')
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('transactionChart1').getContext('2d');

                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: 'Purchase Charts',
                            data: data.amounts,
                            backgroundColor: 'rgb(169,137,21)',
                            borderColor: 'rgb(169,137,21)',
                            borderWidth: 1,
                            fill: 'origin' // Fill the area below the line

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>

@endsection

@extends('layouts.sidebar')
@section('tittle', 'Referal')
@section('content')

        <br>
        <br>
    <div class="midde_cont">
    <div class="container-fluid">

<br/>
        <div class="card">
            <div class="card-body">
                <h6>Your Referal Link</h6>
                <!-- The text field -->
                <input id="myInput" type="text" class="form-control" value="https://bytebase.com.ng/register?refer={{$user->username}}" >

                <!-- The button used to copy the text -->
                <button class="btn btn-info" onclick="myFunction()">Copy Referral Link</button>
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

        <br>
        <div class="span9">
            <div class="card-body">
                <div class="module">
                    <div class="module-head">
                        <h3>
                            Referral System</h3>
                    </div>
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <!--        <h3>Transactions</h3>-->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <div class="module-body table">
                                            <!--        <table class="datatable-1 table table-bordered" >-->
                                            <table id="data-table-buttons"   class="datatable-1 table table-bordered table-striped	 display" >

                                                <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Referal</th>
                                                    <th>Referal Bonus</th>
                                                    <!--                <th>Action</th>-->
                                                </tr>
                                                </thead>
                                                <tbody>
                                               @foreach($refers as $re)
                                                <tr>
                                                    <td>{{$re->username}}</td>
                                                    <td>{{$re->newuserid}}</td>
                                                    <td>{{$re->amount}}</td>
                                                </tr>
                                                   @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

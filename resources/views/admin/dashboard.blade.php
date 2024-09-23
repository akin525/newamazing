@include('admin.layouts.sidebar')

<script src="{{ asset('js/Chart.min.js') }}"></script>

<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="bg bg-secondary">
                    <div class="card-body">
                        <center>
                            <!--                    <h4 class="w3-text-green"><b>&nbsp;&nbsp; &nbsp;&nbsp; <a class="w3-btn w3-green w3-border w3-round-large" href="with.php">Withdraw From MCD Wallet</a>-->
                            <a class="btn btn-rounded rounded btn-success" href="{{route('admin/credit')}}">Credit User</a>
                            <a class="btn btn-rounded rounded btn-success" href="#">Withdraw Sammighty Bonus Wallet</a>

                            <a class="btn btn-rounded btn-success" href="{{route('admin/credit')}}">Refund User</a>
                            <a class="btn btn-rounded btn-success" href="{{route('admin/charge')}}">Charge User</a>

                            <!--                            <a class="w3-btn w3-green w3-border w3-round-large" href="method.php">All Payment Method</a>-->
                        </center>
                    </div>
                    </b></h4>  	</div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="row column1">
                <div class="col-md-7 col-lg-6">
                    <div class="card">
                        <canvas id="transactionChart" width="800" height="600"></canvas>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="card">
                        <canvas id="transactionChart1" width="800" height="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="row column1">
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-bars yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$data['bill']}}</h5>
                                <h6 class="head_couter">Number Of Today Bill</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-bars blue1_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$data['deposit']}}</h5>
                                <h6 class="head_couter">Number Of Today Deposit</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-users green_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$data['user']}}</h5>
                                <h6 class="head_couter">Today New Users</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-users yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$data['nou']}}</h5>
                                <h6 class="head_couter">Number of Today Visitors</h6>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="row column1">--}}
{{--                <div class="col-md-7 col-lg-6">--}}
{{--                    <div class="card">--}}
{{--                        <canvas id="myPieChart"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-7 col-lg-6">--}}
{{--                    <div class="card">--}}
{{--                        <canvas id="myPieChart1"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
            <div class="row column1">
                <div class="col-md-7 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{number_format(intval($data['sum_deposits'] *1),2)}}</h5>

                                <h6 class="head_couter">Today Total Deposits</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money blue1_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>

                                <h5 class="total_no text-center">₦{{ number_format(intval($data['sum_bill'] *1),2)}}</h5>
                                <h6 class="head_couter">Today Total Purchase</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="row column1">
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-google-wallet yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{ number_format(intval($totalwallet *1),2)}}</h5>
                                <h6 class="head_couter">All User Balance</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money blue1_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{ number_format(intval($totaldeposite *1),2)}}</h5>
                                <h6 class="head_couter">All Total Deposit</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money green_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{number_format(intval($bill *1),2)}}</h5>
                                <h6 class="head_couter">All Total Bills</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-users yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$alluser}}</h5>
                                <h6 class="head_couter">Total Users</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row column1">
                <div class="col-md-7 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{number_format(intval($tran *1),2)}}</h5>

                                <h6 class="head_couter">Sammighty Balance</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money blue1_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>

                                <h5 class="total_no text-center">₦{{ number_format(intval($easy *1),2)}}</h5>
                                <h6 class="head_couter">Easyaccess balance</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row column1">
                <div class="col-md-7 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{ number_format(intval($totalcharge *1),2)}}</h5>
                                <h6 class="head_couter">Total Charges</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money blue1_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{number_format(intval($totalprofit *1),2)}}</h5>
                                <h6 class="head_couter">Total Profit</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                fetch('/transactions')
                    .then(response => response.json())
                    .then(data => {
                        var ctx1 = document.getElementById('transactionChart').getContext('2d');

                        var chart = new Chart(ctx1, {
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
                fetch('/transactions1')
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

            <script>
                $(function () {
                    "use strict";
                    // Bar chart
                    new Chart(document.getElementById("bar-chart"), {
                        type: 'bar',
                        data: {
                            labels: ["Total Users Wallet", "Total Bills", "Deposits"],
                            datasets: [
                                {
                                    label: "Population (millions)",
                                    backgroundColor: ["#03a9f4", "#e861ff","#08ccce"],
                                    data: [200000,300000,400000]
                                }
                            ]
                        },
                        options: {
                            legend: { display: false },
                            title: {
                                display: true,
                                text: 'System Payment Chart'
                            }
                        }
                    });


                    // line second
                });
            </script>

            <script>
                // Horizental Bar Chart
                new Chart(document.getElementById("bar-chart-horizontal"), {
                    type: 'horizontalBar',
                    data: {
                        labels: ["All Users", "Active Users"],
                        datasets: [
                            {
                                label: "Total Users",
                                backgroundColor: ["#0000FF","#00FF00"],
                                data: [250,200]
                            }
                        ]
                    },
                    options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'System Customers Chart'
                        }
                    }
                });
            </script>


        </div>
        <!-- /.row -->
    </div>
</div>


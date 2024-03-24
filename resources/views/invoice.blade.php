@extends('layouts.sidebar')
@section('tittle', 'Invoice')
@section('content')
    <div class="col-lg-12 mb-30">
        <div class="card mt-30">
            <div class="card-body">
                <div class="userDatatable adv-table-table global-shadow border-light-0 w-100 adv-table">
                    <div class="table-responsive">
                        <div class="adv-table-table__header">
                            <h4>All Purchase</h4>
                        </div>

                        <div class="col-lg-12 mb-30">
                            <div class="card">
                                <div class="card-header color-dark fw-500">
                                    Invoice
                                </div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Username</th>
                                        <th>Receipt</th>
                                        <th>Plan</th>
                                        <th>Amount</th>
                                        <th>Phone No</th>
                                        <th>Payment_Ref</th>
                                        <th>Token</th>
                                        <!--                                                    <th>Action</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bill as $re)
                                        <tr>
                                            <td>{{$re->date}}</td>
                                            <td>{{$re->username}}</td>
                                            <td><a href="{{route('viewpdf', $re->id)}}" class="btn btn-success"><i class="fa fa-download">Pdf</i></a> </td>
                                            <td>{{$re->plan}}</td>
                                            <td>{{$re->amount}}</td>
                                            <td>{{$re->phone}}</td>
                                            <td>{{$re->refid}}</td>
                                            <td>{{$re->token}}</td>
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

@endsection

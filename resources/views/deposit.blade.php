@extends('layouts.sidebar')
@section('tittle', 'All Deposit')
@section('content')
    <div class="col-lg-12 mb-30">
        <div class="card mt-30">
            <div class="card-body">
                <div class="userDatatable adv-table-table global-shadow border-light-0 w-100 adv-table">
                    <div class="table-responsive">
                        <div class="adv-table-table__header">
                            <h4>All Deposit</h4>
                            <div class="adv-table-table__button">
                                <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle dm-select" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Export
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                        <a class="dropdown-item" href="#">copy</a>
                                        <a class="dropdown-item" href="#">csv</a>
                                        <a class="dropdown-item" href="#">print</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-30">
                            <div class="card">
                                <div class="card-header color-dark fw-500">
                                    Deposit
                                </div>
                                <div class="card-body p-0">
                                    <div class="table4 table5 p-25">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr class="userDatatable-header">
                                                    <th>
                                                        <div class="userDatatable-title">
                                                            Username
                                                            <div class="d-flex justify-content-between align-items-center w-100">
<span class="userDatatable-sort">
<i class="fas fa-caret-down"></i>
</span>
                                                                <span class="userDatatable-filter">
<i class="fas fa-filter"></i>
</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="userDatatable-title">
                                                            AAmount
                                                            <div class="d-flex justify-content-between align-items-center w-100">
<span class="userDatatable-sort">
<i class="fas fa-sort-up up"></i>
<i class="fas fa-caret-down down"></i>
</span>
                                                                <span class="userDatatable-filter">
<i class="fas fa-filter"></i>
</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="userDatatable-title">
                                                           Refid
                                                            <div class="d-flex justify-content-between align-items-center w-100">
<span class="userDatatable-sort">
<i class="fas fa-sort-up up"></i>
<i class="fas fa-caret-down down"></i>
</span>
                                                                <span class="userDatatable-filter">
<i class="fas fa-filter"></i>
</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="userDatatable-title">
                                                           Amount Before
                                                            <div class="d-flex justify-content-between align-items-center w-100">
<span class="userDatatable-sort">
<i class="fas fa-sort-up up"></i>
<i class="fas fa-caret-down down"></i>
</span>
                                                                <span class="userDatatable-filter">
<i class="fas fa-filter"></i>
</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="userDatatable-title">
                                                           Amount After
                                                            <div class="d-flex justify-content-between align-items-center w-100">
<span class="userDatatable-sort">
<i class="fas fa-sort-up up"></i>
<i class="fas fa-caret-down down"></i>
</span>
                                                                <span class="userDatatable-filter">
<i class="fas fa-filter"></i>
</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="userDatatable-title">
                                                           Date
                                                            <div class="d-flex justify-content-between align-items-center w-100">
<span class="userDatatable-sort">
<i class="fas fa-sort-up up"></i>
<i class="fas fa-caret-down down"></i>
</span>
                                                                <span class="userDatatable-filter">
<i class="fas fa-filter"></i>
</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($deposit as $dep)
                                                <tr>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                           {{$dep['username']}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            ₦{{number_format(intval($dep['amount'] *1),2)}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                         {{$dep['payment_ref']}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            ₦{{number_format(intval($dep['iwallet'] *1),2)}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            ₦{{number_format(intval($dep['fwallet'] *1),2)}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{$dep['date']}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-end mt-30">
                                            <nav class="dm-page ">
                                                <ul class="dm-pagination d-flex">
                                                    <li class="dm-pagination__item">
                                                        {{$deposit->links()}}
                                                    </li>

                                                </ul>
                                            </nav>
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

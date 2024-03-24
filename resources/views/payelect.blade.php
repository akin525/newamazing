@extends('layouts.sidebar')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="#" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">{{Auth::user()->name}}</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Pay Electricity</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboards</a></li>
                            <li class="breadcrumb-item active">Pay Electricity</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-10">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Electricity</h3>
                            <ul class="breadcrumb">
                                {{--                                <li class=""><a href="{{route('dashboard')}}">Dashboard</a></li>--}}
                                {{--                                <li class="breadcrumb-item active">Profile</li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!--                    <div class="box w3-card-4">-->
                        <div class="row">
                            <div class="col-sm-8">
                                <br>
                                <br>
                                <div class="alert alert-danger" id="ElectNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
                                </div>
                                <div id="electPanel">
                                    <div class="alert alert-danger">0.1% discount apply.</div>
                                    <form action="{{route('payelect')}}" method="post">
                                        @csrf
                                        <div  class="form-group">
                                            <label  class="requiredField">
                                                Meter Name
                                                <span class="asteriskField">*</span>
                                            </label>
                                            <div class="input-group input-group-outline my-3">
                                            <input type="text" name="name" class="form-control" value="{{$log}}" readonly required/>
                                            </div>
                                        </div>
                                        <div  class="form-group">
                                            <label  class="requiredField">
                                                Meter Number
                                                <span class="asteriskField">*</span>
                                            </label>
                                            <div class="input-group input-group-outline my-3">
                                            <input type="text" name="number" class="form-control" value="{{$request->number}}" readonly required/>
                                            </div>
                                            </div>
                                        <div  class="form-group">
                                            <label  class="requiredField">
                                                Amount
                                                <span class="asteriskField">*</span>
                                            </label>
                                            <div class="input-group input-group-outline my-3">
                                            <input type="number" name="amount" class="form-control"  required/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{$request->id}}"/>
                                        <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">

                                        <button type="submit" class="btn process"
                                                style="color: white;background-color: #13b10d;margin-bottom:15px;"> Purchase
                                        </button>
                                        <!--                        <button type="button" id="verify" class=" btn" style="margin-bottom:15px;">  <span id="process"><i class="fa fa-circle-o-notch fa-spin " style="font-size: 30px;animation-duration: 1s;"></i> Validating Please wait </span>  <span id="displaytext">Validate Meter Number </span></button>-->
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-4 ">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
    </div>
        </div>
    </main>
@endsection

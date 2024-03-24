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

        <br>
        <br>
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product list</h6>
            </div>
        </div>
            <script>
                function myNewFunction(sel) {
                    // alert(sel.options[sel.selectedIndex].id);
                    document.getElementById("po").value = (sel.options[sel.selectedIndex].id);
                    document.getElementById("pk").value = (sel.options[sel.selectedIndex].text);
                }
            </script>

                <form action="{{ route('bill') }}" method="post" class="m-lg-3">
                    @csrf
                    <div class="row ">
                        <div class="col-sm-8 card card-body">
                            <div class="card card-body">
                            <div id="AirtimeNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 23px;display: none;"></div>
                            <div id="AirtimePanel">
                    <label for="network" class=" requiredField">
                        Select Network from the Rectangular Box<span class="asteriskField">*</span>
                    </label>
                    <div class="input-group input-group-outline mb-3">
                    <select  name="productid" class="text-success form-control" onChange="myNewFunction(this);" required="">
                        <option>-------</option>
                        @foreach($data as $datas)
                            <option value="{{$datas->id}}" id="{{$datas->tamount}}" >{{$datas->network}}{{$datas->plan}} || {{$datas->tamount}}
                            </option>
                        @endforeach

                    </select>
                    </div>
                    <br>
                    <label for="network" class=" requiredField">
                        Amount<span class="asteriskField">*</span>
                    </label>
                    <div class="input-group input-group-outline mb-3">
                    <input name="amount" class="text-success form-control" value="" placeholder="Amount" id="po" readonly>
                    </div>
                        <br>
                    <input type="hidden" name="id" value="<?php echo rand(10000000, 999999999); ?>">

                    <label for="network" class=" requiredField">
                        Enter Phone no<span class="asteriskField">*</span>
                    </label>
                    <div class="input-group input-group-outline mb-3">
                    <input type="number" name="number" class="form-control" required>
                    </div>
                    <br>
                    <button type="submit" class=" btn" style="color: white;background-color: #28a745">Buy Now<span class="load loading"></span></button>
                    <script>
                        const btns = document.querySelectorAll('button');
                        btns.forEach((items)=>{
                            items.addEventListener('click',(evt)=>{
                                evt.target.classList.add('activeLoading');
                            })
                        })
                    </script>
                            </div>
                        </div>
                        </div>
                </form>
        <br>


        <div class="col-sm-4 ">
        <p>You can use the codes below to check your Data Balance!  </p>
        <h6>
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary"> MTN [SME] *461*4# or *556#</li>
                <li class="list-group-item list-group-item-success">MTN [CG] *131*4# or *460*260#</li>
                <li class="list-group-item list-group-item-action">9mobile [Gifting] *228#</li>
                <li class="list-group-item list-group-item-primary">Airtel *140#</li>
                <li class="list-group-item list-group-item-primary">Glo *127*0#</li>
            </ul>
        </h6>
        </div>
        <br>
    </div>
    </main>
@endsection

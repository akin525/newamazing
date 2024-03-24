@include('layouts.sidebar')
<div class="page-title">
    <div class="row align-items-center justify-content-between">
        <div class="col-xl-4">
            <div class="page-title-content">
                <h3>Recharge</h3>
            </div>
        </div>
        <div class="col-auto">
            <div class="breadcrumbs"><a href="{{route('dashboard')}}">Home </a><span>
                    <i class="ri-arrow-right-s-line"></i></span><a href="#">Recharge</a></div>
        </div>
    </div>
</div>
<style>
    img {
        max-width: 100%;
        height: auto;
    }
</style>
<div class="card">
    <div class="card-body">
        <x-validation-errors  class="alert alert-danger" />
        <div class="row column1">
            <div class="col-md-7 col-lg-6">
                <div class="full counter_section margin_bottom_30">
                    <div class="counter_no">
                        <div class="card-body">
                            <center>
                                <a href="#">
                                    <img  width="300" src="{{asset('images/dg.png')}}" alt="">
                                </a>
                                {{--                            <h5 class="total_no text-center">₦{{number_format(intval($lock *1),2)}}</h5>--}}
                                <h4 class="text-center">Buydata</h4>
                                <button type="button" class="btn btn-success text-center" onclick="window.location='{{route('select')}}'">Buy Now</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-6">
                <div class="full counter_section margin_bottom_30">
                    <div class="counter_no">
                        <div class="card-body">
                            <center>
                                <a href="#">
                                    <img width="300" src="{{asset('images/ai.jfif')}}"  alt="">
                                </a>
                                <h4 class="text-center">Buy Airtime</h4>
                                <button type="button" class="btn btn-success" onclick="window.location='{{route('airtime')}}'">Buy Now</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

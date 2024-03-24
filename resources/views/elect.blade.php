@extends('layouts.sidebar')
@section('tittle', 'Electricity')
@section('content')

    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
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
                                    <h6 class="fw-500">Electricity</h6>
                                </div>

                                <div class="add-product__body px-sm-40 px-20">
                                    <form id="dataForm" >
                                        @csrf
                                        <div  class="form-group">
                                            <label  class="requiredField">
                                                Select  Electricity Company
                                                <span class="asteriskField">*</span>
                                            </label>
                                            <div class="input-group input-group-outline my-3">
                                            <select name="id" id="firstSelect" class="text-success form-control" required>
                                                <option selected="">---------</option>
                                                @foreach($tv as $tv1)
                                                    <option value="{{$tv1['id']}}">{{$tv1['plan']}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div id="div_id_network" class="form-group">
                                            <label for="network" class=" requiredField">
                                                Enter Meter Number<span class="asteriskField">*</span>
                                            </label>
                                            <div class="">
                                                <input type="number" id="number" name="number" minlength="11" class="text-success form-control" required>
                                            </div>
                                        </div>
                                        <br/>
                                        <div id="div_id_network" class="form-group">
                                            <label for="network" class=" requiredField">
                                                Meter Name<span class="asteriskField">*</span>
                                            </label>
                                            <div class="" >
                                                <input type="text" id="name" name="name" class="text-success form-control" required readonly>

                                            </div>
                                        </div>
                                        <div id="div_id_network" >
                                            <label for="network" class=" requiredField">
                                                Enter Amount<span class="asteriskField">*</span>
                                            </label>
                                            <div class="">
                                                <input type="number" id="amount" name="amount" min="50" max="4000" class="text-success form-control" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                        <br>
                                        <button type="submit" class="btn process"
                                                style="color: white;background-color: #13b10d;margin-bottom:15px;"> Continue
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#number').on('input', function() {
                var inputElement = document.getElementById("number");
                var inputValue = inputElement.value;
                var secondS = $('#firstSelect');
                var third = $('#name');

                if (inputValue.length === 11) {
                    $('#loadingSpinner1').show();

                    $.ajax({
                        url: '{{ url('velect') }}/' + inputValue + '/' + secondS.val(),
                        type: 'GET',
                        data: {
                            value1: inputValue,
                            value2: secondS.val()
                        },
                        success: function(response) {
                            $('#loadingSpinner1').hide();
                            $('#name').val(response);
                        },
                        error: function(xhr) {
                            $('#loadingSpinner1').hide();
                            Swal.fire({
                                icon: 'error',
                                title: 'fail',
                                text: xhr.responseText
                            });
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally
                // Get the form data
                var formData = $(this).serialize();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to buy ' + document.getElementById("firstSelect").options[document.getElementById("firstSelect").selectedIndex].text + ' of ' + document.getElementById("amount").value + ' on ' + document.getElementById("number").value + ' (' + document.getElementById("name").value + ')?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#loadingSpinner').show();
                        $.ajax({
                            url: "{{route('payelect')}}",
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
                                    });
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


                // Send the AJAX request
            });
        });

    </script>


@endsection

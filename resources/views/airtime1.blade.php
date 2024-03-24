@extends('layouts.sidebar')
@section('tittle', 'Airtime')
@section('content')
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
    <div class="col-lg-12">

        <div class="product-add global-shadow px-sm-30 py-sm-50 px-0 py-20 bg-white radius-xl w-100 mb-40">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-lg-10">
                    <div class="mx-sm-30 mx-20 ">

                        <div class="card add-product p-sm-30 p-20 mb-30">
                            <div class="card-body p-0">
                                <div class="card-header">
                                    <h6 class="fw-500">Airtime Purchase</h6>
                                </div>

                                <div class="add-product__body px-sm-40 px-20">


                                    <form id="dataForm" >
                                        @csrf

                                        <div class="form-group">
                                            <label for="name1">Network</label>
                                            <select name="name" id="name1" class="text-success form-control" required="">
                                                <option>Select your network</option>
                                                <option value="01">MTN</option>
                                                <option value="02">GLO</option>
                                                <option value="03">AIRTEL</option>
                                                <option value="04">9MOBILE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="number" id="amount" name="amount" oninput="calc()" min="100" max="4000" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Number">Number</label>
                                            <input type="number" id="number" name="number" minlength="11" class="form-control" required>
                                        </div>
                                        <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="amount" style="color: #000000"><b>Amount to Pay (<span>₦</span>)</b></label>
                                                <br>
                                                <span class="text-danger">2% Discount:</span> <b class="text-success">₦<span id="shownow1"></span></b>
                                            </div>
                                        </div>
                                        <script>
                                            function calc(){
                                                var value = document.getElementById("amount").value;
                                                var percent = 2/100 * value;
                                                var reducedvalue = value - percent;
                                                document.getElementById("shownow1").innerHTML = reducedvalue;

                                            }
                                        </script>
                                        <br>
                                        <button type="submit" class=" btn" style="color: white;background-color: #28a745" id="btnsubmit"> Purchase Now</button>
                                    </form>

                                </div>
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
                            url: "{{ route('buyairtime1') }}",
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
@endsection

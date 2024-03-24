@extends('layouts.sidebar')
@section('tittle', 'Upgrade')
@section('content')
    <div class="col-lg-12">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="product-add global-shadow px-sm-30 py-sm-50 px-0 py-20 bg-white radius-xl w-100 mb-40">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-lg-10">
                    <div class="mx-sm-30 mx-20 ">

                        <div class="card add-product p-sm-30 p-20 mb-30">
                            <div class="card-body p-0">
                                <div class="card-header">
                                    <h6 class="fw-500">Become A Reseller </h6>
                            </div>

                                <div class="add-product__body px-sm-40 px-20">
                                    <h6><strong>Notification: </br></strong><b class='align-content-center'>Note that You can request for a website after you upgrade. You will have access to cheaper prices of products too! </b></h6>
                                    <br>
                                    <form id="dataForm">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">

                                        <label class="form-control">NGN1,000</label>
                                    </div>
                                    <input type="number" id="amount"  class="form-control" name="amount" value="1000" required readonly/>
                                </div>
                            </div>
                            <center>
                            <button class="btn btn-outline-info text " type="submit">Upgrade Now</button>
                            </center>
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
                    text: 'Do you want to Upgrade to Reseller with ₦' + document.getElementById("amount").value + ' ?',
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
                            url: "{{route('mp')}}",
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
                                        location.reload(); // Reload the page
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
            });
        });

    </script>
@endsection

@extends('layouts.sidebar')
@section('tittle', 'Fund Wallet')
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
                                    <h6 class="fw-500">CONFIRM/REQUERY DEPOSIT</h6>
                                </div>
                                <div class="add-product__body px-sm-40 px-20">
                                    <form style="padding-left: 30px;" id="dataForm" class="text-center">
                                        @csrf
                                        <div class="text-left" style="color:red; font-family: Verdana; font-size: 30px;">Validate</div>
                                            <div class='card'>
                                             <strong>Notification: </br></strong><b class='align-content-center'>Note:
                                                    Transactions might not be verified at all times here. Pay attention to your transaction status response
                                                </b>
                                            </div>
                                        <center>
                                            <div class="col-lg-4">
                                                <label for="amount">Reference Number</label>
                                                <input type="text" id="ref" name="refid" placeholder="Copy And Paste transaction refid here" class="form-control" required /><br>
                                            </div>
                                        <div class="col-lg-4">
                                            <div class="form-submit">
                                                <button type="submit"  class="btn btn-danger">Verify</button>
                                            </div>
                                        </div>
                                        </center>
                                </div>
                                </form>
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
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                $('#loadingSpinner').show();

                // Send the AJAX request
                $.ajax({
                    url: "{{ route('vdepo') }}",
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
                                icon: 'error',
                                title: 'fail',
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
            });
        });

    </script>


@endsection

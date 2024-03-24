@extends('layouts.sidebar')
@section('tittle', 'Datapin')
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
                                    <h6 class="fw-500">DataPin Purchase</h6>
                                </div>

                                <div class="add-product__body px-sm-40 px-20">


                                <form id="dataForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name1">Network</label>
                            <select name="name" class="text-success form-control" required>
                                <option value="165">MTN</option>
                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name1">Plan</label>
                                        <select  name="productid"  class="text-success form-control" onChange="myNewFunction(this);" required="">
                                <option value="{{$product->network}}" > MTN 1.5GB (DATACARD)</option>
                                        </select>
                                    </div>
                    <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
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
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                $('#loadingSpinner').show();

                // Send the AJAX request
                $.ajax({
                    url: "{{ route('datapon') }}",
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


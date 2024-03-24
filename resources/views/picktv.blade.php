@extends('layouts.sidebar')
@section('tittle', 'Tv Subscription')
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
                                    <h6 class="fw-500">Tv Subscription</h6>
                                </div>

                                <div class="add-product__body px-sm-40 px-20">

                                <form id="dataForm">
                                        @csrf
                                    <div class="form-group">
                                        <label for="name1">Tv</label>
                                            <select name="id" id="firstSelect" class="text-success form-control" required>
                                                <option selected="">---------</option>
                                                <option value="DSTV">DSTV</option>
                                                <option value="GOTV">GOTV</option>
                                                <option value="STARTIMES">STARTIMES</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name1">Select Plan</label>
                                            <select name="productid" id="secondSelect" class="text-success form-control" required>

                                                <option>Select Your Plan</option>
                                            </select>
                                        </div>

                                    <div class="form-group">
                                        <label for="name1">Enter IUC Number</label>
                                            <input type="number" id="number" name="number" minlength="10" class="text-success form-control" required>
                                        </div>

                                    <div class="form-group">
                                        <label for="name1">IUC Name</label>
                                            <input type="text" id="name" name="name" class="text-success form-control" readonly>

                                        </div>
                                    <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                    <button type="submit" class="btn btn-primary" >PURCHASE</button>
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
            $('#firstSelect').change(function() {
                var selectedValue = $(this).val();
                // Show the loading spinner
                $('#loadingSpinner').show();
                // Send the selected value to the '/getOptions' route
                $.ajax({
                    url: '{{ url('getOptions') }}/' + selectedValue,
                    type: 'GET',
                    success: function(response) {
                        // Handle the successful response
                        var secondSelect = $('#secondSelect');
                        $('#loadingSpinner').hide();
                        // Clear the existing options
                        secondSelect.empty();

                        // Append the received options to the second select box
                        $.each(response, function(index, option) {
                            secondSelect.append('<option  value="' + option.id + '">' + option.plan +  ' --₦' + option.tamount + '</option>');
                        });

                        // Select the desired value dynamically
                        var desiredValue = 'value2'; // Set the desired value here
                        secondSelect.val(desiredValue);
                    },
                    error: function(xhr) {
                        // Handle any errors
                        console.log(xhr.responseText);
                    }
                });
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#number').on('input', function() {
                var inputElement = document.getElementById("number");
                var inputValue = inputElement.value;
                var secondS = $('#firstSelect');
                var third = $('#name');

                if (inputValue.length === 10 || inputValue.length === 11) {
                    $('#loadingSpinner1').show();

                    $.ajax({
                        url: '{{ url('verifytv') }}/' + inputValue + '/' + secondS.val(),
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
                    text: 'Do you want to buy ' + document.getElementById("secondSelect").options[document.getElementById("secondSelect").selectedIndex].text + ' on ' + document.getElementById("number").value + '?',
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
                            url: "{{ route('tvp') }}",
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
                                        text: response.responseText
                                    });
                                    console.log(response.responseText);

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


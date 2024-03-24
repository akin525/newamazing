@extends('layouts.sidebar')
@section('tittle', 'Buy Data')
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
                                    <h6 class="fw-500">Data Purchase</h6>
                                </div>

                                <div class="add-product__body px-sm-40 px-20">


                                <form id="dataForm">
                    @csrf
                                    <div class="form-group">
                                        <label for="firstSelect">Network</label>
                    <select  name="id" id="firstSelect" class="text-success form-control" required="">
                        <option>Select your network</option>
                        @if ($serve->name == 'mcd')
                            <option value="mtn-data">MTN</option>
                            <option value="glo-data">GLO</option>
                            <option value="etisalat-data">9MOBILE</option>
                        @elseif($serve->name=='easyaccess')
                            <option value="MTN">MTN</option>
                            <option value="GLO">GLO</option>
                            <option value="9MOBILE">9MOBILE</option>
                            <option value="AIRTEL">AIRTEL</option>
                        @elseif($serve->name=='sammighty')
                            <option value="MTN">MTN</option>
                            <option value="GLO">GLO</option>
                            <option value="GLO_CG">GLO_CG</option>
                            <option value="9MOBILE">9MOBILE</option>
                            <option value="9MOBILE_SME">9MOBILE_SME</option>
                            <option value="AIRTEL">AIRTEL_DG</option>
                            <option value="AIRTEL_CG">AIRTEL_CG</option>
                        @endif
                        @if ($serve->name == 'mcd')
                            <option value="airtel-data">AIRTEL</option>
                        @endif
                    </select>
                    </div>
                                    <div class="form-group">
                                        <label for="secondSelect">Select Plan</label>
                                        <select name="productid" id="secondSelect" class="text-success form-control" required="" onchange='document.getElementById("po").value = this.value.id;'>

                                            <option>Select Your Plan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="number">Number</label>
                                        <input type="number" id="number" name="number" minlength="11" class="text-success form-control" required>
                                    </div>
                                    <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">

                                    <button type="submit" class=" btn" style="color: white;background-color: #28a745">Purchase Now</button>

                                </div>
                </form>
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
                            url: "{{ route('bill') }}",
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
                                        // location.reload();
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


                // Send the AJAX request
            });
        });

    </script>
@endsection

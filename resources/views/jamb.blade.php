@extends('layouts.sidebar')
@section('tittle', 'Jamb PIN')
@section('content')
    <div class="col-lg-12">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="product-add global-shadow px-sm-30 py-sm-50 px-0 py-20 bg-white radius-xl w-100 mb-40">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-lg-10">
                    <div class="mx-sm-30 mx-20 ">

                        <div class="card add-product bm p-sm-30 p-20 mb-30">
                            <div class="card-body p-0">
                                <div class="card-header">
                                    <h6 class="fw-500">Jamb</h6>
                                </div>

                                <div class="add-product__body px-sm-40 px-20">
                            <script>
                                $(document).ready(function() {
                                    toastr.options.timeOut = 60000;
                                    @if (Session::has('error'))
                                    toastr.error('{{ Session::get('error') }}');
                                    @elseif(Session::has('success'))
                                    toastr.success('{{ Session::get('success') }}');
                                    @endif
                                });

                            </script>


                                    <div class="add-product__body px-sm-40 px-20">
{{--                                        <form style="padding-left: 30px;" class="text-center">--}}
{{--                                            <div class="text-left" style="color:red; font-family: Verdana; font-size: 30px;">Fund Wallet</div>--}}
{{--                                                <div class='card'>--}}
{{--                                                    <strong>Notification: </br></strong><b class='align-content-center'>Jamb</b></div>--}}
{{--                                                <strong>Notification: </br></strong><b class='align-content-center'>Jamb Not available yet comback next year 2024</b>--}}


                                    </div>



                                                                <form  id="dataForm">
                                @csrf
                                <div class="row card card-body">
                                <x-validation-errors  class="alert alert-success" />

                                    <div class="col-lg-12">
                                        <label class="small mb-1" for="numofpins" style="color: #000000">JAMB PROFILE CODE </label>
                                        <div class="input-group input-group-outline my-3">
                                            <input id="number" type="number" name="number" class="form-control rounded-right py-4"  style="border-radius: 0px;" required>

                                        </div>
                                    </div>
                                    <div  class="form-group">
                                        <label  class="requiredField">
                                            Candidate Name
                                            <span class="asteriskField">*</span>
                                        </label>
                                        <input type="text" id="name" name="name" class="text-success form-control" readonly>
                                    </div>
                                    <div  class="form-group">
                                        <label  class="requiredField">
                                            Candidate Mobile No
                                            <span class="asteriskField">*</span>
                                        </label>
                                        <input type="text" id="number1" name="number1" class="text-success form-control" required>
                                    </div>
                                    <div  class="form-group">
                                        <label  class="requiredField">
                                            UTME TYPE
                                            <span class="asteriskField">*</span>
                                        </label>
                                        <div class="input-group input-group-outline my-3">
                                            <select name="code" class="text-success form-control" required>
                                                <option selected="">---------</option>
                                                    <option value="utme-mock">utme-mock</option>
                                                    <option value="utme-no-mock">utme-no-mock</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="small mb-1" for="numofpins" style="color: #000000">Amount per Unit (₦)</label>
                                        <div class="input-group input-group-outline my-3">
                                            <input id="amount" name="amount" class="form-control rounded-right py-4" value="{{$jamb['tamount']}}" style="border-radius: 0px;" readonly="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="refid" value="{{rand(111111111, 999999999)}}">
{{--                                    <input type="hidden" name="code" value="utme">--}}
                                    <button id="confirm" class="btn btn-primary font-weight-bold py-2 my-4" type="button">Verify Profile</button>
                                    <button class="btn btn-primary font-weight-bold py-2 my-4" type="submit">Generate</button>
                            </form>
                            <a class="btn btn-info text-center font-weight-bold py-2 my-4" href="{{route('dashboard')}}" style="text-decoration: none;">
                                Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                <br>
                <br>
                <br>
                <div class="content">
                    <div class="module">
                        <div class="module-head">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                            <h6 class="text-white text-capitalize ps-3">jamb Pins</h6>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                                            <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Date</th>
                                                <th>Username</th>
                                                <th>Seria-Number</th>
                                                <th>Pin</th>
                                                <th>Ref</th>
                                                <!--                                                    <th>Action</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($wa as $re)
                                                <tr>
                                                    <td><a href="#"><i class="fa fa-eye"></i> </a> </td>
                                                    <td>{{$re->created_at}}</td>
                                                    <td>{{$re->username}}</td>
                                                    <td>{{$re->seria}}</td>
                                                    <td>{{$re->pin}}</td>
                                                    <td>{{$re->ref}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                    url: "{{route('jam')}}",
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
    <script>
        $(document).ready(function() {
            function handleButtonClick() {
                var inputElement = document.getElementById("number");
                var inputValue = inputElement.value;
                var third = $('#name');

                    $('#loadingSpinner').show();

                    $.ajax({
                        url: '{{ url('verifypro') }}/' + inputValue,
                        type: 'GET',
                        success: function(response) {
                            $('#loadingSpinner').hide();
                            $('#name').val(response);
                        },
                        error: function(xhr) {
                            $('#loadingSpinner').hide();
                            Swal.fire({
                                icon: 'error',
                                title: 'fail',
                                text: xhr.responseText
                            });
                            console.log(xhr.responseText);
                        }
                    });
                }

            // Bind the function to the button click event
            $('#confirm').on('click', handleButtonClick);
        });
    </script>

@endsection




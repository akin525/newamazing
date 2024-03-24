@extends('layouts.sidebar')
@section('tittle', 'WAEC PIN')
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
                                    <h6 class="fw-500">WAEC Card pin</h6>
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


                            <form  id="dataForm">
                                @csrf
                                <div class="row card card-body">
                                <x-validation-errors  class="alert alert-success" />

                                    <div class="col-lg-12">
                                        <label class="small mb-1" for="numofpins" style="color: #000000">No of Pins</label>
                                        <div class="input-group input-group-outline my-3">
                                            <select id="numofpins" name="value" class="form-control rounded-right" style="border-radius: 0px; height: 50px;" required="">
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="small mb-1" for="numofpins" style="color: #000000">Amount per Unit (₦)</label>
                                        <div class="input-group input-group-outline my-3">
                                            <input id="amount" name="amount" class="form-control rounded-right py-4" value="{{$waec['tamount']}}" style="border-radius: 0px;" readonly="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{rand(111111111, 999999999)}}">
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
                                            <h6 class="text-white text-capitalize ps-3">Waec Pins</h6>
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
                                                    <td><a href="{{route('waecpin', $re->id)}}"><i class="fa fa-eye"></i> </a> </td>
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
                    url: "{{ route('wac') }}",
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




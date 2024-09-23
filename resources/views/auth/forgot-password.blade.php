<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Jun 2023 15:34:22 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Bytebase</title>
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16" href="{{asset('byte.jpg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/plugin.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <link rel="stylesheet" href="{{asset('unicons.iconscout.com/release/v3.0.0/css/line.css')}}">
</head>


    <!-- Loading wrapper start -->
<body>
<main class="main-content">
    <div class="admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                    <div class="edit-profile">
                        <div class="edit-profile__logos">
                            <a href="{{url('/')}}">
                                <img class="dark" src="{{asset('byte.jpg')}}" alt>
                                <img class="light" src="{{asset('byte.jpg')}}" alt>
                            </a>
                        </div>
                        <div class="card border-0">
                            <div class="card-header">
                                <div class="edit-profile__title">
                                    <h6>Forget Password</h6>
                                </div>
                            </div>
        <form method="POST" action="{{ route('passw') }}">
            @csrf

            <div class="card-body">
                @if (session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    @if (session('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="edit-profile__body">
                        <x-validation-errors  class="alert-danger card-body" />
                        <div class="form-group mb-25">
                            <label for="username"> Email Address</label>
                            <input type="text"  name="email" class="form-control" id="email" placeholder="name@example.com">
                        </div>
                    <div class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                        <button type="submit" class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">Submit</button>
                    </div>
                </div>
            </div>
        </form>
                            <div class="px-20">
                                <p class="social-connector social-connector__admin text-center">
                                    <span>Or</span>
                                </p>
                            </div>
                            <div class="admin-topbar">
                                <p class="mb-0">
                                    Back to login?
                                    <a href="{{route('login')}}" class="color-primary">
                                        Login
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div id="overlayer">
    <div class="loader-overlay">
        <div class="dm-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
        </div>
    </div>
</div>
<div class="enable-dark-mode dark-trigger">
    <ul>
        <li>
            <a href="#">
                <i class="uil uil-moon"></i>
            </a>
        </li>
    </ul>
</div>
<script>
    $(document).ready(function() {
        $("#myForm").on("submit", function(event) {
            // Prevent form submission
            event.preventDefault();

            // Disable the submit button
            $("#submitButton").prop("disabled", true);

            // Change button text to "Loading..."
            $("#submitButton").text("Loading...");

            // Perform form submission asynchronously (AJAX call, etc.)
            // Once the submission is complete, you can enable the button and reset the text
        });
    });
</script>

<script src="{{asset('js/plugins.min.js')}}"></script>
<script src="{{asset('js/script.min.js')}}"></script>

</body>
</html>


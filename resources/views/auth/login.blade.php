<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Jun 2023 15:34:22 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Amazing-Data</title>
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16" href="{{asset('ama.jpg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/plugin.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <link rel="stylesheet" href="{{asset('unicons.iconscout.com/release/v3.0.0/css/line.css')}}">
</head>
<body>
<main class="main-content">
    <div class="admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                    <div class="edit-profile">
                        <div class="edit-profile__logos">
                            <a href="{{url('/')}}">
                                <img class="dark" src="{{asset('ama.jpg')}}" alt>
                                <img class="light" src="{{asset('ama.jpg')}}" alt>
                            </a>
                        </div>
                        <x-validation-errors  class="alert alert-danger" />

                        <div class="card border-0">
                            <div class="card-header">
                                <div class="edit-profile__title">
                                    <h6>Sign in Amazing Data</h6>
                                </div>

                            </div>
                            <form method="post"  action="{{ route('login') }}" id="myForm">
                                @csrf
                            <div class="card-body">




                                <div class="edit-profile__body">
                                    <div class="form-group mb-25">
                                        <label for="username"> Email Address</label>
                                        <input type="text"  name="email" class="form-control" id="email" placeholder="name@example.com">
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="password-field">password</label>
                                        <div class="position-relative">
                                            <input id="password-field" type="password"  class="form-control" name="password" placeholder="Password">
                                            <div class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="admin-condition">
                                        <div class="checkbox-theme-default custom-checkbox ">
                                            <input class="checkbox" type="checkbox" id="check-1">
                                            <label for="check-1">
                                                <span class="checkbox-text">Keep me logged in</span>
                                            </label>
                                        </div>
                                        <a href="{{ route('password.request') }}">forget password?</a>
                                    </div>
                                    <div class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn " id="submitButton">
                                            sign in
                                        </button>
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
                                    Don't have an account?
                                    <a href="{{route('register')}}" class="color-primary">
                                        Sign up
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

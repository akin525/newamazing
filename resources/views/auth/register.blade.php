<!doctype html>
<html lang="en" dir="ltr">
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
                            <a href="#">
                                <img class="dark" src="{{asset('ama.jpg')}}" alt>
                                <img class="light" src="{{asset('ama.jpg')}}" alt>
                            </a>
                        </div>
                        <x-validation-errors  class="alert alert-danger" />

                        <div class="card border-0">
                            <div class="card-header">
                                <div class="edit-profile__title">
                                    <h6>Sign-up in Amazing Data</h6>
                                </div>

                            </div>
                            @if (session('error'))
                                <div class="alert alert-success">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="post" role="form" action="{{ route('register') }}">
                                @csrf
                                <div class="card-body">
                                <div class="edit-profile__body">
                                    <div class="edit-profile__body">
                                        <div class="form-group mb-20">
                                            <label for="name">name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Full Name">
                                        </div>
                                        <div class="form-group mb-20">
                                            <label for="username">username</label>
                                            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                        </div>
                                        @if(isset($request->refer))
                                            <div class="input-group input-group-outline mb-3">
                                                {{--                                    <label class="form-label">Refer</label>--}}
                                                <input type="text" name="refer" value="{{$request->refer}}" class="form-control" readonly/>
                                            </div>
                                        @else
                                            <div class="field">
                                                <input id="username" class="block mt-1 w-full" type="hidden" name="refer" value="1" required autofocus autocomplete="username" readonly/>
                                            </div>
                                        @endif
                                        <div class="form-group mb-20">
                                            <label for="email">Email Address</label>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com">
                                        </div>
                                        <div class="form-group mb-20">
                                            <label for="email">Address</label>
                                            <input type="text" name="address" class="form-control" id="address" >
                                        </div>
                                        <div class="form-group mb-20">
                                            <label for="email">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" id="dob" >
                                        </div>
                                        <div class="form-group mb-20">
                                            <label for="email">Select Gender</label>
                                            <select  name="gender" class="form-control" id="gender" >
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-20">
                                            <label for="email">Phone Number</label>
                                            <input type="number" name="number" class="form-control"  >
                                        </div>
                                        <div class="form-group mb-15">
                                            <label for="password-field">password</label>
                                            <div class="position-relative">
                                                <input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
                                                <div class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2"></div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-15">
                                            <label for="password-field">Confirmed-password</label>
                                            <div class="position-relative">
                                                <input id="password-field" type="password" class="form-control" name="password_confirmation"  placeholder="Password">
                                                <div class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2"></div>
                                            </div>
                                        </div>
                                        <div class="admin-condition">
                                            <div class="checkbox-theme-default custom-checkbox ">
                                                <input class="checkbox" type="checkbox" id="admin-1">
                                                <label for="admin-1">
<span class="checkbox-text">Creating an account means you’re okay
with our <a href="#" class="color-primary">Terms of
Service</a> and <a href="#" class="color-primary">Privacy
Policy</a>
my preference</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                            <button class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                Create Account
                                            </button>
                                        </div>
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
                                    <a href="{{route('login')}}" class="color-primary">
                                        Sign In
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

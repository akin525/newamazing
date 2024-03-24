@extends('layouts.sidebar')
@section('tittle', 'MyAccount')
@section('content')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
<div class="col-lg-12">
    <div class="breadcrumb-main">
        <h4 class="text-capitalize breadcrumb-title">My profile</h4>
        <div class="breadcrumb-action justify-content-center flex-wrap">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My profile</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="col-xxl-3 col-lg-4 col-sm-5">

    <div class="card mb-25">
        <div class="card-body text-center p-0">
            <div class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">
                <div class="ap-img mb-20 pro_img_wrapper">
                    <input id="file-upload" type="file" name="fileUpload" class="d-none">
                    <label for="file-upload">

                        <img class="ap-img__main rounded-circle wh-120" src="{{asset('pa.jpg')}}" alt="profile">
                        <span class="cross" id="remove_pro_pic">
<img src="img/svg/camera.svg" alt="camera" class="svg">
</span>
                    </label>
                </div>
                <div class="ap-nameAddress pb-3">
                    <h5 class="ap-nameAddress__title">{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                    <p class="ap-nameAddress__subTitle fs-14 m-0">{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                </div>
            </div>
            <div class="ps-tab p-20 pb-25">
                <div class="nav flex-column text-start" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-selected="true">
                        <img src="img/svg/user.svg" alt="user" class="svg">Edit profile</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-selected="false">
                        <img src="img/svg/settings.svg" alt="setting" class="svg">Account
                        setting</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-selected="false">
                        <img src="img/svg/key.svg" alt="key" class="svg">change password</a>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="col-xxl-9 col-lg-8 col-sm-7">
    <div class="as-cover">
        <div class="as-cover__imgWrapper">
            <input id="file-upload1" type="file" name="fileUpload" class="d-none">
            <label for="file-upload1">
                <img src="img/ap-header.png" alt="image" class="w-100">
                <span class="ap-cover__changeImgBtn">
<span class="btn btn-outline-primary cover-btn">
<img src="img/svg/camera.svg" alt="camera" class="svg">Change
Cover</span>
</span>
            </label>
        </div>
    </div>
    <div class="mb-50">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                <div class="edit-profile mt-25">
                    <div class="card">
                        <div class="card-header px-sm-25 px-3">
                            <div class="edit-profile__title">
                                <h6>Edit Profile</h6>
                                <span class="fs-13 color-light fw-400">Set up your personal
information</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6">
                                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                        @livewire('profile.update-profile-information-form')

                                        <x-x-section-border />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                <div class="edit-profile mt-25">
                    <div class="card">
                        <div class="card-header  px-sm-25 px-3">
                            <div class="edit-profile__title">
                                <h6>Account setting</h6>
                                <span class="fs-13 color-light fw-400">Update your username and manage your
account</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6">
                                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                        <div class="mt-10 sm:mt-0">
                                            @livewire('profile.two-factor-authentication-form')
                                        </div>

                                        <x-x-section-border />
                                    @endif
                                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                            <x-x-section-border />

                                            <div class="mt-10 sm:mt-0">
                                                @livewire('profile.delete-user-form')
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                <div class="edit-profile mt-25">
                    <div class="card">
                        <div class="card-header  px-sm-25 px-3">
                            <div class="edit-profile__title">
                                <h6>change password</h6>
                                <span class="fs-13 color-light fw-400">Change or reset your account
password</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6">

                                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                        <div class="mt-10 sm:mt-0">
                                            @livewire('profile.update-password-form')
                                        </div>

                                        <x-x-section-border />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                <div class="edit-profile edit-social mt-25">
                    <div class="card">
                        <div class="card-header  px-sm-25 px-3">
                            <div class="edit-profile__title">
                                <h6>social profiles</h6>
                                <span class="fs-13 color-light fw-400">Add elsewhere links to your
profile</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6">
                                    <div class="edit-profile__body mx-xl-20">
                                        <form>
                                            <div class=" mb-30">
                                                <label for="socialUrl">facebook</label>
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
<span class="input-group-text border-facebook bg-facebook text-white wh-44 radius-xs justify-content-center" id="addon-wrapping1">
<i class="lab la-facebook-f fs-18"></i>
</span>
                                                    </div>
                                                    <input type="text" class="form-control form-control--social" placeholder="Url" aria-label="Username" aria-describedby="addon-wrapping1" id="socialUrl">
                                                </div>
                                            </div>
                                            <div class=" mb-30">
                                                <label for="twitterUrl">twitter</label>
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
<span class="input-group-text border-twitter bg-twitter text-white wh-44 radius-xs justify-content-center" id="addon-wrapping2">
<i class="lab la-twitter fs-18"></i>
</span>
                                                    </div>
                                                    <input type="text" class="form-control form-control--social" placeholder="@Username" aria-label="Username" aria-describedby="addon-wrapping2" id="twitterUrl">
                                                </div>
                                            </div>
                                            <div class=" mb-30">
                                                <label for="webUrl">Website</label>
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
<span class="input-group-text border-ruby  bg-ruby text-white wh-44 radius-xs justify-content-center" id="addon-wrapping3">
<i class="las la-basketball-ball fs-18"></i>
</span>
                                                    </div>
                                                    <input type="text" class="form-control form-control--social" placeholder="Url" aria-label="Username" aria-describedby="addon-wrapping3" id="webUrl">
                                                </div>
                                            </div>
                                            <div class=" mb-30">
                                                <label for="instagramUrl">instagram</label>
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
<span class="input-group-text border-instagram  bg-instagram text-white wh-44 radius-xs justify-content-center" id="addon-wrapping4">
<i class="lab la-instagram fs-18"></i>
</span>
                                                    </div>
                                                    <input type="text" class="form-control form-control--social" aria-describedby="addon-wrapping4" placeholder="Url" id="instagramUrl">
                                                </div>
                                            </div>
                                            <div class=" mb-30">
                                                <label for="githubUrl">github</label>
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
<span class="input-group-text border-dark  bg-dark  text-white wh-44 radius-xs justify-content-center" id="addon-wrapping5">
<i class="lab la-github fs-18"></i>
</span>
                                                    </div>
                                                    <input type="text" class="form-control form-control--social" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping5" id="githubUrl">
                                                </div>
                                            </div>
                                            <div class=" mb-0">
                                                <label for="mediumUrl">medium</label>
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
<span class="input-group-text border-dark bg-dark text-white wh-44 radius-xs justify-content-center" id="addon-wrapping6">
<i class="lab la-medium fs-18"></i>
</span>
                                                    </div>
                                                    <input type="text" class="form-control form-control--social" placeholder="Username" aria-label="medium" aria-describedby="addon-wrapping6" id="mediumUrl">
                                                </div>
                                            </div>
                                            <div class="button-group d-flex flex-wrap pt-50 mb-15">
                                                <button class="btn btn-primary btn-default btn-squared me-15 text-capitalize">Update Social Profiles
                                                </button>
                                                <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification-tab">

                <div class="edit-profile edit-social mt-25">
                    <div class="card">
                        <div class="card-header px-sm-25 px-3">
                            <div class="edit-profile__title">
                                <h6>Notifications</h6>
                                <span class="fs-13 color-light fw-400">Add elsewhere links to your
profile</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="notification-content p-25 border mb-25">
                                <div class="notification-content__title d-flex justify-content-between flex-wrap pb-20 text-capitalize">
                                    <h6 class="fs-15 text-light fw-500 lh-normal">Notifications</h6>
                                    <a class="text-primary fs-13" href="#">toggle all</a>
                                </div>
                                <div class="global-shadow radius-xl notification-content__body-wrapper">
                                    <div class="notification-content__body p-25 border-bottom">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <div class="div">
                                                <h6>Company News</h6>
                                                <span>Get company news, announcements, and product
updates</span>
                                            </div>
                                            <div class="custom-control  form-check form-switch  my-lg-0 my-10">
                                                <input type="checkbox" class="form-check-input" id="nc1">
                                                <label class="form-check-label" for="nc1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-content__body p-25 border-bottom">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <div class="div">
                                                <h6>Meetups Near You</h6>
                                                <span>Get company news, announcements, and product
updates</span>
                                            </div>
                                            <div class="custom-control  form-check form-switch  my-lg-0 my-10">
                                                <input type="checkbox" class="form-check-input" id="nc2">
                                                <label class="form-check-label" for="nc2"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-content__body p-25 border-bottom">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <div class="div">
                                                <h6>Opportunities</h6>
                                                <span>Get company news, announcements, and product
updates</span>
                                            </div>
                                            <div class="custom-control  form-check form-switch  my-lg-0 my-10">
                                                <input type="checkbox" class="form-check-input" id="nc3">
                                                <label class="form-check-label" for="nc3"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-content__body p-25">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <div class="div">
                                                <h6>Weekly Newsletters</h6>
                                                <span>Get company news, announcements, and product
updates</span>
                                            </div>
                                            <div class="custom-control  form-check form-switch  my-lg-0 my-10">
                                                <input type="checkbox" class="form-check-input" id="nc4">
                                                <label class="form-check-label" for="nc4"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-content p-25 border mb-25">
                                <div class="notification-content__title d-flex justify-content-between flex-wrap pb-20 text-capitalize">
                                    <h6 class="fs-15 text-light fw-500 lh-normal">Account Activity</h6>
                                    <a class="text-primary fs-13" href="#">toggle all</a>
                                </div>
                                <div class="global-shadow radius-xl notification-content__body-wrapper">
                                    <div class="notification-content__body p-25 border-bottom">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <div class="div">
                                                <h6>Anyone seeing my profile page</h6>
                                            </div>
                                            <div class="custom-control  form-check form-switch  my-lg-0 my-10">
                                                <input type="checkbox" class="form-check-input" id="nc5">
                                                <label class="form-check-label" for="nc5"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-content__body p-25 border-bottom">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <div class="div">
                                                <h6>Anyone follow me</h6>
                                            </div>
                                            <div class="custom-control  form-check form-switch  my-lg-0 my-10">
                                                <input type="checkbox" class="form-check-input" id="nc6">
                                                <label class="form-check-label" for="nc6"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-content__body p-25 border-bottom">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <div class="div">
                                                <h6>Someone mentions me</h6>
                                            </div>
                                            <div class="custom-control  form-check form-switch  my-lg-0 my-10">
                                                <input type="checkbox" class="form-check-input" id="nc7">
                                                <label class="form-check-label" for="nc7"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-content__body p-25 border-bottom">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <div class="div">
                                                <h6>Someone accepts my invitation</h6>
                                            </div>
                                            <div class="custom-control  form-check form-switch  my-lg-0 my-10">
                                                <input type="checkbox" class="form-check-input" id="nc8">
                                                <label class="form-check-label" for="nc8"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-content__body p-25">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            <div class="div">
                                                <h6>Anyone send me a message</h6>
                                            </div>
                                            <div class="custom-control  form-check form-switch  my-lg-0 my-10">
                                                <input type="checkbox" class="form-check-input" id="nc9">
                                                <label class="form-check-label" for="nc9"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-group d-flex flex-wrap pt-25 mb-25">
                                <button class="btn btn-primary btn-default btn-squared me-15 text-capitalize">Update notification Profiles
                                </button>
                                <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    @stack('modals')

    @livewireScripts
@endsection
@section('script')

@endsection

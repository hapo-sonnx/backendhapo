@extends('layouts.app')

@section('content')
    <section class="container-fluid profile-container">
        <form class="row main-profile" action="{{ route('user.update', $users->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="col-lg-4 profile align-self-center">
                <div class="avatar-user row justify-content-md-center">
                    @if (isset($user->logo_path))
                    <img src="{{ $users->logo_path }}" alt="ava-user">
                        <i class="fas fa-camera icon-upload-ava" id="iconUploadAva"></i>
                        <input type="file" name="favauser" class="input-upload-ava" id="inputUploadAva">
                    @else
                        <img src="{{ asset('image/avatar_user.png') }}" alt="ava-user">
                        <i class="fas fa-camera icon-upload-ava" id="iconUploadAva"></i>
                        <input type="file" name="favauser" class="input-upload-ava" id="inputUploadAva">
                    @endif
                </div>
                <div class="profile-user row justify-content-md-center">
                    <div class="name-user col align-self-center">{{ $user->name }}</div>
                    <div class="email-user col align-self-center">{{ $user->email }}</div>
                </div>
                <hr>
                <div class="description-user">
                    <img src="{{ asset('image/birthday.png') }}" alt="phone icon">
                    <p class="txt-user">{{ $user->date_of_birthday }}</p>
                </div>
                <hr>
                <div class="description-user">
                    <img src="{{ asset('image/phone_user_icon.png') }}" alt="phone icon">
                    <p class="txt-user">{{ $user->phone }}</p>
                </div>
                <hr>
                <div class="description-user">
                    <img src="{{ asset('image/adress_icon.png') }}" alt="adress icon">
                    <p class="txt-user">{{ $user->address }}</p>
                </div>
                <hr>
                <div class="about-user-profile">
                    <p>{{ $user->about }}</p>
                </div>

            </div>
            <div class="col-lg-8 edit-profile-container">
                <div class="txt-my-profile">
                    <p>My Profile</p>
                </div>
                <div class="img-your-courses row justify-content-md-center">
                    @foreach ($user->courses as $course)
                        <div class="img-your-course">
                            <img src="{{ asset($course->logo_path) }}" alt="{{ $course->title }}">
                        </div>
                    @endforeach
                    <div class="img-your-course">
                        <a href="/courses">
                            <img class="img_add" src="{{ asset('image/Gruop123.png') }}" alt="img_add">
                        </a>
                    </div>
                </div>
                <div class="txt-my-profile">
                    <p>Edit profile</p>
                </div>
                <div class="edit-profile-input">
                    <input type="hidden" name="fid" value="{{ $user->id }}">
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <p class="edit-input-label">Name:</p>
                            <input type="text" id="fname" class="form-control edit-input-profile" name="fname"
                                placeholder="Your name..." value="{{ $user->name }}">
                        </div>
                        <div class="col-lg-6">
                            <p class="edit-input-label">Email:</p>
                            <input type="text" id="femail" class="form-control edit-input-profile" name="femail"
                                placeholder="Your email..." value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="row form-group ">
                        <div class="col-lg-6">
                            <p class="edit-input-label">Date of birthday:</p>
                            <input placeholder="Select date" type="date" id="datepicker"
                                class="form-control edit-input-profile datepicker" value="{{ $user->brithday }}">
                        </div>
                        <div class="col-lg-6">
                            <p class="edit-input-label">Phone:</p>
                            <input type="text" id="fphone" class="form-control edit-input-profile" name="fphone"
                                placeholder="Your phone number..." value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <p class="edit-input-label">Address:</p>
                            <input type="text" id="fadress" class="form-control edit-input-profile" name="faddress"
                                placeholder="Your address..." value="{{ $user->address }}">
                        </div>
                        <div class="col-lg-6">
                            <p class="edit-input-label">About me:</p>
                            <textarea id="fabout" class="form-control edit-input-profile" name="fabout"
                                placeholder="Your about me..." rows="5">{{ $user->about }}</textarea>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-lg-6">
                            <input class="btn-save-profile" type="submit" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

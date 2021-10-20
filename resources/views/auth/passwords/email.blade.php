@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-email">
                    <div class="card-header card-email-header">
                        <p class="reset-password-txt">Reset Password</p>
                        <p class="reset-password-guide">Enter email to reset your password</p>
                    </div>

                    <div class="card-body card-email-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group row justify-content-md-center">
                                <div class="col-md-6 col-form-label text-lg-center form-reset-email">
                                    <div class="label-reset-email row justify-content-md-left">
                                        <label for="email" class="___class_+?11___">{{ __('E-Mail Address') }}</label>
                                    </div>
                                    <div class="input-reset-email row justify-content-md-left">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row m-0 justify-content-md-center">
                                <div class="col-md-6 btn-reset-password">
                                    <input type="submit" class="btn-reset" value="RESET PASSWORD">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
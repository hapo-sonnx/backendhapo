<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content modalcontent">
            <button class="close btn-close" data-dismiss="modal" aria-label="Close">
                <img class="img-but" src="{{ asset('image/Vector_22.png') }}" alt="logo mess">
            </button>
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item text-login">
                    <a class="nav-link active login-text" id="nav-login" data-toggle="pill" href="#home">LOGIN</a>
                </li>
                <li class="nav-item text-login">
                    <a class="nav-link login-text" id="nav-register" data-toggle="pill" href="#menu">REGISTER</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <div id="login" class="container tab-pane active">

                        <form class="form-login" action="{{ route('login') }}" method="POST">
                            @csrf
                            <label class="label-username">Username:</label>
                            <br>
                            <input class="text-username input-login @error('email') check-login @enderror"
                                placeholder="E-mail" name="email" type="email">
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <label class="label-passwords pass">Password:</label>
                            <br>
                            <input class="text-username input-login  @error('password') check-login @enderror"
                                placeholder="Password" name="password" type="password">
                            @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <div class="option-login">
                                <div class=" form-check box-remember">
                                    <input class="form-check-input" type="checkbox" value="true" id="remember-me">
                                    <label class="form-check-label" for="remember-me">Remember me
                                </div>
                                <a href="{{route('password.request')}}" class="forgot-pass">Forgot password</a>
                            </div>
                            <div>
                                <button type="submit" class="btn-login">{{ __('Login') }}</button>
                            </div>
                        </form>

                        <div class="text-with">
                            <p class="login-with">Login with</p>
                        </div>
                        <a href="{{route('login.google')}}" class="text-gg"><i class="fab fa-google-plus-g fa-lg icon-gg"></i>Google</a>
                    <br>
                        <div class="facebook"> 
                            <a href="{{route('login.facebook')}}" class="text-face"><i class="fab fa-facebook-f fa-lg icon-face"></i></i>Facebook</a>
                        </div>
                    </div>
                </div>

                <div id="menu" class="container tab-pane fade"><br>
                    <form class="form-register" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="label-usernamee">Username:</label>
                            <input class="text-usernamee input-register" @error('name') check-register  @enderror"
                                id="name" name="name" type="text">
                            @error('name')
                                <span class="check-register " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label-usernamee">Email:</label>
                            <br>
                            <input class="text-usernamee  input-register" @error('email_user') check-register  @enderror"
                                id="email" name="email_user" type="text">
                            @error('email_user')
                                <span class="check-register " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label-password ">Password:</label>
                            <br>
                            <input
                                class="text-usernamee  input-register" @error('password_register') is-invalid @enderror"
                                name="password_register" type="text">
                            @error('password_register')
                                <span class="is-invalid" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label-usernamee">Repeat Password:</label>
                            <br>
                            <input
                                class="text-usernamee  input-register" @error('password_confirmation') is-invalid @enderror"
                                id="password-confirm" name="password_confirmation" type="text">
                            @error('password_confirmation')
                                <span class="is-invalid" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-login">{{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

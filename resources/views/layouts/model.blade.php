
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content modalcontent">
                <button class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <img class="img-but" src="./images/Vector_22.png" alt="logo mess">
                </button>
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item text-login">
                        <a class="nav-link active login-text" data-toggle="pill" href="#home">LOGIN</a>
                    </li>
                    <li class="nav-item text-login">
                        <a class="nav-link login-text" data-toggle="pill" href="#menu">REGISTER</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                        <div id="login" class="container tab-pane active">

                            <form class="form-login" action="{{ route('login') }}" method="POST">
                                @csrf
                                <label class="label-username">Username:</label>
                                <br>
                                <input class="text-username" placeholder="E-mail" name="email" type="email">
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                                <label class="label-password pass">Password:</label>
                                <br>
                                <input class="text-username" placeholder="Password" name="password" type="password">
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                                <div class="option-login">
                                    <div class=" form-check box-remember">
                                        <input class="form-check-input" type="checkbox" value="true" id="remember-me">
                                        <label class="form-check-label" for="remember-me">Remember me
                                    </div>
                                    <a href="#" class="forgot-pass">Forgot password</a>
                                </div>
                                <div>
                                    <button type="submit" class="btn-login">{{ __('Login') }}</button>
                                </div>
                            </form>

                            <div class="text-with">
                                <p class="login-with">Login with</p>
                            </div>
                            <p class="text-gg"><i class="fab fa-google-plus-g fa-lg icon-gg"></i>Google</p>
                            <p class="text-face"><i class="fab fa-facebook-f fa-lg icon-face"></i></i>Facebook</p>
                        </div>
                    </div>

                    <div id="menu" class="container tab-pane fade"><br>
                        <form class="form-register" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="label-usernamee">Username:</label>
                                <input class="text-usernamee input-register @error('name') is-invalid @enderror" id="name"
                                    name="name" type="text">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-usernamee">Email:</label>
                                <br>
                                <input class="text-usernamee  input-register @error('email_user') is-invalid @enderror"
                                    id="email" name="email_user" type="text">
                                @error('email_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-password ">Password:</label>
                                <br>
                                <input
                                    class="text-usernamee  input-register @error('password_register') is-invalid @enderror"
                                    name="password_register" type="text">
                                @error('password_register')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-usernamee">Repeat Password:</label>
                                <br>
                                <input
                                    class="text-usernamee  input-register @error('password_confirmation') is-invalid @enderror"
                                    id="password-confirm" name="password_confirmation" type="text">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
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
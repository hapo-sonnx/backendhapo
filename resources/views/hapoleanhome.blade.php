@extends('layouts.app')

@section('content')

    <header class="container-fluid home">
        <nav class="navbar navbar-expand-lg navbar-light">

            <div class="logo">
                <a class="img-hapo1">
                    <img class="img-hapo" src="{{ asset('image/hapo_learn.png') }}" alt="logo">
                </a>
            </div>
            <div class="right-link">
                <button class="navbar-toggler backout" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" onclick="showheader()" id="showheader"></span>
                    <span class="my-1 mx-1 close fa fa-times img-close-header" onclick="hideheader()" id="hideheader"
                        style="display:none"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active text-text btn-x ">

                            <a class="nav-link texthome btn-x">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  all btn-x">ALL COURSES</a>
                        </li>
                        @if (!Auth::check())
                            <li class="nav-item">
                                <a class="nav-link btn-x" href="#" data-toggle="modal"
                                    data-target="#myModal">LOGIN/REGISTER</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link btn-x" href="#">Profile</a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link btn-x" href="/logout">Logout</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="banner">
        <div class="content-banner">
            <div class="banner-text">
                <span class="text-learn">Learn AnyTime, AnyWhere</span>
                <span class="text-at">at HapoLearn !</span>
                <small class="text-inter">Interective lessons, "on-the-go"</small>
                <small class="text-inter-practice">practice, peer support</small>
                <p class="d-flex justify-content-center text-start">Start Learning Now!</p>
            </div>
        </div>
        <div class="background-linear-gradient"></div>
    </div>

    <div class="container group">
        <div class="row text-row">
            <div class="col-lg-4 col-text">
                <div class="card">
                    <div class="logo html">
                        <img src="./images/img-html.png" class="card-img-top" alt="html">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">HTML/CSS/JS Tutorial</h5>
                        <p class="card-text">I knew hardly anything about HTML, JS, and CSS before entering New Media. I
                            had coded quite a bit, but never touched anything in regards to web development.</p>
                        <a href="#" class="btn btn-primary text-take">Take This Course</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-text">
                <div class="card">
                    <div class="logo laravel">
                        <img class="card-img-left" src="./images/img-laravel.png" alt="laravel">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">LARAVEL Tutorial</h5>
                        <p class="card-text">I knew hardly anything about HTML, JS, and CSS before entering New Media. I
                            had coded quite a bit, but never touched anything in regards to web development.</p>
                        <a href="#" class="btn btn-primary text-take">Take This Course</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-text">
                <div class="card">
                    <div class="logo php">
                        <img class="card-img-top" src="./images/img-php.png" alt="php">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">PHP Tutorial</h5>
                        <p class="card-text">I knew hardly anything about HTML, JS, and CSS before entering New Media. I
                            had coded quite a bit, but never touched anything in regards to web development.</p>
                        <a href="#" class="btn btn-primary text-take">Take This Course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="other">
        <p class="text-other">Other courses</p>
    </div>

    <div class="container text-ruby">
        <div class="row ruby">
            <div class="col-lg-4 col-text">
                <div class="card">
                    <div class="logo html-css">
                        <img class="card-img-css" src="./images/CSS.png" alt="css">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">CSS Tutorial</h5>
                        <p class="card-text-new">I knew hardly anything about HTML, JS, and CSS before entering New
                            Media. I
                            had coded quite a bit, but never touched...</p>
                        <a href="#" class="btn btn-primary text-take take">Take This Course</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-text">
                <div class="card">
                    <div class="logo laravel-logo">
                        <img class="card-img-laravel" src="./images/img-rails.png" alt="rails">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Ruby on rails Tutorial</h5>
                        <p class="card-text-new">I knew hardly anything about HTML, JS, and CSS before entering New
                            Media. I
                            had coded quite a bit, but never touched...</p>
                        <a href="#" class="btn btn-primary text-take take">Take This Course</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-text">
                <div class="card">
                    <div class="logo php-java">
                        <img class="card-img-java" src="./images/java.png" alt="java">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Java Tutorial</h5>
                        <p class="card-text-new">I knew hardly anything about HTML, JS, and CSS before entering New
                            Media. I
                            had coded quite a bit, but never touched...</p>
                        <a href="#" class="btn btn-primary text-take take">Take This Course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="view">
        <span class="all">
            <a href="#" class="btn-text-view">View All Our Courses</a> <img class="arrow" src="./images/ten.png"
                alt="arrow">
        </span>
    </div>

    <section class="container-fluid why-hapo">
        <div class="container-laptop">
        </div>
        <div class="row row-why">
            <div class="col-sm-6 col-hapo col-left">
                <img class="img-laptop" src="./images/img-computer.png" alt="computer">
                <p class="text-why">Why HapoLearn?</p>
                <p class="text-interactive inner">
                    <span><i class="fas fa-check-circle"></i></span>
                    Interactive lessons, "on-the-go" practice, peer support.
                </p>
                <p class="text-interactive">
                    <span><i class="fas fa-check-circle"></i></span>
                    Interactive lessons, "on-the-go" practice, peer support.
                </p>
                <p class="text-interactive">
                    <span><i class="fas fa-check-circle"></i></span>
                    Interactive lessons, "on-the-go" practice, peer support.
                </p>
                <p class="text-interactive">
                    <span><i class="fas fa-check-circle"></i></span>
                    Interactive lessons, "on-the-go" practice, peer support.
                </p>
                <p class="text-interactive tive">
                    <span><i class="fas fa-check-circle"></i></span>
                    Interactive lessons, "on-the-go" practice, peer support.
                </p>
            </div>
            <div class="col-sm-6 col-hapo col-right">
                <img class="img-mobi" src="./images/img-mobile.png" alt="mobile">
            </div>
        </div>
    </section>

    <div class="other-feed">
        <p class="text-feed">Feedback</p>
        <p class="text-what">What other students turned professionals have to say about us <br> after learning with us
            and reaching their goals</p>
    </div>

    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row row-feedback">
                    <div class="col-lg-5 feedback-left">
                        <a class="fas fa-chevron-circle-left fa-2x icon-feedback" href="#demo" data-slide="prev"></a>
                        <div class="row feedback-content-row">
                            <p class="feedback-content">“A wonderful course on how to start. Eddie beautifully
                                conveys all essentials of a
                                becoming a good Angular developer. Very glad to have taken this course. Thank you
                                Eddie Bryan.”
                            </p>
                            <img src="./images/img-but.png" class="seed" alt="feedback">
                        </div>
                        <div class="row user-feedback">
                            <div class="col-2 col-img">
                                <img src="./img/Ellipse.png" class="img-feedback" alt="feedback">
                            </div>
                            <div class="col col-name">
                                <p class="name-feedback">Hoang Anh Nguyen</p>
                                <p class="name-feedback">PHP</p>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 feedback-right">
                        <div class="row feedback-content-row">
                            <p class="feedback-content">“A wonderful course on how to start. Eddie beautifully
                                conveys all essentials of a
                                becoming a good Angular developer. Very glad to have taken this course. Thank you
                                Eddie Bryan.”
                            </p>
                            <img src="./images/img-but.png" class="seed" alt="feedback">
                        </div>
                        <div class="row user-feedback">
                            <div class="col-2 col-img">
                                <img src="./images/Ellipse.png" class="img-feedback" alt="feedback">
                            </div>
                            <div class="col col-name">
                                <p class="name-feedback">Hoang Anh Nguyen</p>
                                <p class="name-feedback">Python</p>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                        </div>
                    </div>
                    <a class="fas fa-chevron-circle-right fa-2x icon-feedbackright" href="#demo" data-slide="next"></a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row row-feedback">
                    <div class="col-lg-5 feedback-left">
                        <a class="fas fa-chevron-circle-left fa-2x icon-feedback" href="#demo" data-slide="prev"></a>
                        <div class="row feedback-content-row">
                            <p class="feedback-content">“A wonderful course on how to start. Eddie beautifully
                                conveys all essentials of a
                                becoming a good Angular developer. Very glad to have taken this course. Thank you
                                Eddie Bryan.”
                            </p>
                            <img src="./images/img-but.png" class="seed" alt="feedback">
                        </div>
                        <div class="row user-feedback">
                            <div class="col-2 col-img">
                                <img src="./images/Ellipse.png" class="img-feedback" alt="feedback">
                            </div>
                            <div class="col col-name">
                                <p class="name-feedback">Hoang Anh Nguyen</p>
                                <p class="name-feedback">PHP</p>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 feedback-right">
                        <div class="row feedback-content-row">
                            <p class="feedback-content">“A wonderful course on how to start. Eddie beautifully
                                conveys all essentials of a
                                becoming a good Angular developer. Very glad to have taken this course. Thank you
                                Eddie Bryan.”
                            </p>
                            <img src="./images/img-but.png" class="seed" alt="feedback">
                        </div>
                        <div class="row user-feedback">
                            <div class="col-2 col-img">
                                <img src="./images/Ellipse.png" class="img-feedback" alt="feedback">
                            </div>
                            <div class="col col-name">
                                <p class="name-feedback">Hoang Anh Nguyen</p>
                                <p class="name-feedback">Python</p>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                        </div>
                    </div>
                    <a class="fas fa-chevron-circle-right fa-2x icon-feedbackright" href="#demo" data-slide="next"></a>
                </div>
            </div>
        </div>
    </div>

    <section class="container-fluid img-become">
        <div class="become">
            <p class="text-become">Become a member of our <br> growing community!</p>
        </div>
        <div class="learning">
            <p class="text-startlearning">Start Learning Now!</p>
        </div>
    </section>

    <div class="static">
        <p class="text-static">Statistic</p>
    </div>
    <div class="row row row-statistic-index">
        <div class="col-sm-4 col-statistic">
            <p class="text-courses">Courses</p>
            <p class="text-index">1,586</p>
        </div>
        <div class="col-sm-4 col-statistic">
            <p class="text-courses">Lessons</p>
            <p class="text-index">2,689</p>
        </div>
        <div class="col-sm-4 col-statistic">
            <p class="text-courses">Learners</p>
            <p class="text-index">16,882</p>
        </div>
    </div>

    <footer class="container-fluid footer">
        <div class="row row-footer">
            <div class="col-lg-4 text-footer">
                <img class="logo-footer" src="./images/Hapo_Learn_white.png" alt="logo HapoLearn">
                <p class="logo-text">Interactive lessons, "on-the-go" practice, peer support.</p>
            </div>
            <div class="col-lg-2 contact">
                <p class="text-home">Home</p>
                <p class="text-home">Features</p>
                <p class="text-home">Courses</p>
                <p class="text-home">Blog</p>
            </div>
            <div class="col-lg-2 contact terms">
                <p class="text-terms">Contact</p>
                <p class="text-terms">Terms of Use</p>
                <p class="text-terms">FAQ</p>
            </div>
            <div class="col-lg-4 col-button">
                <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                    data-placement="bottom" data-content="facebook.com/tuyen.dung.haposoft">
                    <img class="img-icon" src="./images/Group_3.png" alt="icon face">
                </button>
                <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                    data-placement="bottom" data-content="+84-85-645-9898">
                    <img class="img-icon" src="./images/Group_4.png" alt="icon face">
                </button>
                <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                    data-placement="bottom" data-content="info@haposoft.com">
                    <img class="img-icon" src="./images/Group_5.png" alt="icon face">
                </button>
            </div>
        </div>
    </footer>

    <div class="footer-bottom">
        <p class="text-all">© 2020 HapoLearn, Inc. All rights reserved.</p>
    </div>

    <div class="img-mess"><img class="" src="./images/messenger.png" alt="logo mess"></div>
    <div class="text-mess">
        <div class="close-button"><i class="fas fa-times"></i></div>
        <div class="hapolearn-text">HapoLearn</div>
        <div class="message-from-hapolearn">
            <img class="hapo-logo" src="./images/logo_hapo.png" alt="logo mess">
            <div class="hapo-text-message">HapoLearn xin chào bạn. <br>
                Bạn có cần chúng tôi hỗ trợ gì không? </div>
        </div>
        <a href="#" class="button-messenger"><i class="fab fa-facebook-messenger  mr-2"></i> Đăng nhập vào Messenger</a>
        <div class="chat-with-txt">Chat với HapoLearn trong Messenger</div>
    </div>

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
                                <label class="label-password pass">Password:</label>
                                <br>
                                <input class="text-username" placeholder="Password" name="password" type="password">
                                <div class="option-login">
                                    <div class=" form-check box-remember">
                                        <input class="form-check-input" type="checkbox" value="true" id="remember-me">
                                        <label class="form-check-label" for="remember-me">Remember me
                                    </div>
                                    <a href="#" class="forgot-pass">Forgot password</a>
                                </div>
                                <div>
                                    <button type="submit" class="btn-login">{{ __('Login') }}</button>
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $message)
                                            <span class="err-login" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @endforeach
                                    @endif
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
@endsection

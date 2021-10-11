@extends('layouts.app')

@section('content')

  

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
<<<<<<< Updated upstream
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
=======
            @foreach ($otherCourses as $item)
            <div class="col-lg-4 col-text">
                <div class="card">
                    <div class="logo html-css">
                        <img class="card-img-css"  src="{{ asset($item->logo_path) }}"  alt="css">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text-new">{{ $item->description }}</p>
                        <a href="/allcourses/coursedetail/{{ $item->id }}"  class="btn btn-primary text-take take">Take This Course</a>
>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
            @endforeach
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
                @foreach($reviews as $review)
                <div class="row row-feedback">
                    <div class="col-lg-5 feedback-left">
                        <a class="fas fa-chevron-circle-left fa-2x icon-feedback" href="#demo" data-slide="prev"></a>
                        <div class="row feedback-content-row">
                            <p class="feedback-content">{{ $review->content }}
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
                    <a class="fas fa-chevron-circle-right fa-2x icon-feedbackright" href="#demo" data-slide="next"></a>
                </div>
                @endforeach
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
            <p class="text-index">{{$totalCourses}}</p>
        </div>
        <div class="col-sm-4 col-statistic">
            <p class="text-courses">Lessons</p>
            <p class="text-index">{{$totalLessons}}</p>
        </div>
        <div class="col-sm-4 col-statistic">
            <p class="text-courses">Learners</p>
            <p class="text-index">{{$totalUsers}}</p>
        </div>
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
@endsection

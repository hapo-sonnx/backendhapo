<header class="container-fluid home">
    <nav class="navbar navbar-expand-lg navbar-light">

        <div class="logohapo">
            <a class="img-hapo">
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
                    <li class="nav-item btn-x ">
                        <a class="nav-link btn-x  {{ Route::is('home') ? 'activer' : '' }}" href="{{ route('home')}}">HOME</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  all btn-x {{ Route::is('courses*') ? 'activer' : '' }}"
                            href="{{ route('courses.index')}}">ALL COURSES</a>
                    </li>
                    @if (!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link btn-x" id="btnRegisLogin" href="#" data-toggle="modal"
                                data-target="#myModal">LOGIN/REGISTER</a>
                        </li>
                    @endif

                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link btn-x" href="/logout">LOGOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-x" href="{{ route('user.show', Auth::user()->id) }}">PROFILE</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

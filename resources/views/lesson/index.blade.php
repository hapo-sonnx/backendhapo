@extends('layouts.app')

@section('content')
    <section class="course-detail container-fluid">
        <div class="course-detail-container">
            <div class="row row-one">
                <div class="col-lg-8">
                    <div class="img-container">
                        <img src="{{ asset($course->logo_path) }}" alt="anh">
                    </div>
                    <div class="row p-0 row-progress">
                        <div class="col-lg-2 align-self-center col-txt">
                            <p>Progress :</p>
                        </div>
                        <div class="progress p-0 col-lg-9 align-self-center">
                            <div class="progress-bar" id="progress" role="progressbar" aria-valuenow="{{ $percentage }}"
                                aria-valuemin="0" aria-valuemax="100" style="width:{{ $percentage }}%">
                                <span id="showPercentage">{{ $percentage }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 detail-lesson-of-course">
                    <div class="col-lg-12 col-show-other">
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('image/lesson_icon.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0 align-self-center col-txt">
                                <p>Course :</p>
                            </div>
                            <div class="col-lg-7 pl-0 align-self-center col-txt col-txt-main">
                                <p>{{ $course->title }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('image/learn.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0 align-self-center col-txt">
                                <p>Learners :</p>
                            </div>
                            <div class="col-lg-7 pl-0 align-self-center col-txt col-txt-main">
                                <p>{{ $numberStudent->numberUserStudent }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('image/times.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0 align-self-center col-txt">
                                <p>Times :</p>
                            </div>
                            <div class="col-lg-7 pl-0 align-self-center col-txt col-txt-main">
                                <p>{{ $numberStudent->courseTime }} h</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('image/tags.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0 align-self-center col-txt">
                                <p>Tags :</p>
                            </div>
                            <div class="col-lg-7 pl-0 align-self-center col-txt col-txt-tags">
                                <p>@foreach ($tags as $tag) {{ $tag->content }} @endforeach</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg-2 align-self-center col-icon">
                                <img src="{{ asset('image/pirce.png') }}" alt="">
                            </div>
                            <div class="col-lg-3 pr-0 align-self-center col-txt">
                                <p>Price :</p>
                            </div>
                            <div class="col-lg-7 pl-0 align-self-center col-txt col-txt-main">
                                <p>{{ number_format($course->price) }} VND</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-detail">
                            <div class="col-lg 12 btn-leave-course">
                                <a href="{{ route('courses.leave', $course->id) }}">Leave the course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-two">
                <div class="col-lg-8">
                    <div class="nav-course-detail-container">
                        <ul class="nav nav-tabs nav-course-detail">
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link active btn-nav-detail" data-toggle="tab"
                                    href="#descriptions">Descriptions</a>
                            </li>
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link btn-nav-detail" data-toggle="tab" href="#teacher">Tearcher</a>
                            </li>
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link btn-nav-detail" data-toggle="tab" href="#documents">Documents</a>
                            </li>
                            <li class="nav-item col-lg-2 pl-0">
                                <a class="nav-link btn-nav-detail" data-toggle="tab" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="lessons-teacher-reiews-container">
                        <div class="tab-content">
                            <div id="descriptions" class="tab-pane active">
                                @include('lesson.lesson_info', [$lessons, $tags])
                            </div>
                            <div id="teacher" class="tab-pane">
                                @include('courses.tab_teacher', $teacher)
                            </div>
                            <div id="documents" class="tab-pane">
                                @include('lesson.document', $documents)
                            </div>
                            <div id="reviews" class="tab-pane">
                                @include('lesson.review_lesson')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="col-lg-12 p-0 show-other-courses-container">
                        <div class="txt-show-other-courses">
                            <p>Other Courses</p>
                        </div>
                        @foreach ($otherCourses as $key => $item)
                            <div class="show-other-courses">
                                <p>{{ $key + 1 }}. {{ $item->title }}</p>
                            </div>
                        @endforeach
                        <div class="col-kg-12 btn-view-all">
                            <a href="/courses">View all ours courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

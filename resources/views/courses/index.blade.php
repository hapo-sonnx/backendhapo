@extends('layouts.app')

@section('content')
    <section class="container-fluid p-0 show-all-courses">
        <form class="form-inline" action="{{ route('courses.index') }}" method="GET">
            <div class="filter-and-search row">
                <div class="filter-container">
                    <img class="filter-icon" src="{{ asset('image/filter.png') }} " alt="filter" data-toggle="collapse"
                        href="#multiCollapseExample1" role="button" aria-expanded="false"
                        aria-controls="multiCollapseExample1">
                </div>
                <div class="group-form col-8 col-sm-2 col-md-6 p-0 input-search-container">
                    <input type="text" id="filterSearch" class="form-control mr-sm-2 form-search" name="key"
                        placeholder="Search" aria-label="Search" @if (isset($keyword)) value={{ $keyword }} @endif>
                    <i class="fas fa-search search-icon"></i>
                </div>

                <div class="col-2 col-sm-1 col-md-2 col-lg-1 btn-search-container">
                    <button class="btn btn-outline-success my-2 my-sm-0 btn-search" type="submit">Search</button>
                </div>
            </div>
            <div class="collapse container-fluid container-filter" id="multiCollapseExample1">
                <div class="container-fluid container-main-filter">
                    <div class="row p-0 row-filter-1">
                        <div class="col-sm-1 col-txt-filter">
                            <p class="txt-filter">Filter</p>
                        </div>
                        <div class="col-sm-3 btn-latest-oldest">
                            <input type="radio" class="btn-check inp-filter"
                                value="{{ config('constants.options.newest') }}" name="sort" id="success-outlined"
                                {{ request('sort') == "config('constants.options.newest')" ? 'checked' : '' }}>
                            <label class="btn btn-latest btnLatest label-radio" for="success-outlined">Latest</label>

                            <input type="radio" class="btn-check inp-filter"
                                value="{{ config('constants.options.oldest') }}" name="sort" id="danger-outlined"
                                {{ request('sort') == "config('constants.options.oldest')" ? 'checked' : '' }}>
                            <label class="btn btn-oldest btnLatest label-radio" for="danger-outlined">Oldest</label>
                        </div>
                        <div class="col-sm-2 select-filter">
                            <select name="learner" id="select-learner" class="js-states form-control inputFilter">
                                <option value="">Learner</option>
                                <option value="{{ config('constants.options.ascending') }}" @if (request('learner') == config('constants.options.ascending')) selected @endif>
                                    Ascending
                                </option>
                                <option value="{{ config('constants.options.decrease') }}" @if (request('learner') == config('constants.options.decrease')) selected @endif>
                                    Decrease
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-2 select-filter">
                            <select name="times" id="select-time" class="js-states form-control inputFilter">
                                <option value="">Time</option>
                                <option value="{{ config('constants.options.ascending') }}" @if (request('times') == config('constants.options.ascending')) selected @endif>
                                    Ascending
                                </option>
                                <option value="{{ config('constants.options.decrease') }}" @if (request('times') == config('constants.options.decrease')) selected @endif>
                                    Decrease
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-2 select-filter">
                            <select name="lessons" id="select-lessons" class="js-states form-control inputFilter">
                                <option value="">Lessons</option>
                                <option value="{{ config('constants.options.ascending') }}" @if (request('lessons') == config('constants.options.ascending')) selected @endif>
                                    Ascending
                                </option>
                                <option value="{{ config('constants.options.decrease') }}" @if (request('lessons') == config('constants.options.decrease')) selected @endif>
                                    Decrease
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row p-0 m-0 row-filter-2">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2 select-filter">
                            <select name="tags" id="select-tags" class="js-states form-control inputFilter">
                                <option value="">Tags</option>
                                @foreach ($tags as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == request('tags')) selected
                                @endif>{{ $item->content }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 select-filter">
                            <select name="feedback" id="select-feedback" class="js-states form-control inputFilter">
                                <option value="">Feedback</option>
                                <option value="{{ config('constants.options.ascending') }}" @if (request('feedback') == config('constants.options.ascending')) selected @endif>
                                    Ascending
                                </option>
                                <option value="{{ config('constants.options.decrease') }}" @if (request('feedback') == config('constants.options.decrease')) selected @endif>
                                    Decrease
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input class="btn btn-reset-filter" id="btnResetFilter" type="button" value="Reset">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row row-all-courses">
            @foreach ($courses as $course)
                @include('courses._course', $course)
            @endforeach
        </div>

        <div class="pagination-courses">
            {{ $courses->appends($_GET)->links('pagination::bootstrap-4') }}
        </div>
    </section>
@endsection

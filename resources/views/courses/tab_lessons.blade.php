<div class="row ml-0 mr-0 detail-lessons-container">
    <form class="row form-search-detail" action="{{ route('courses.show', $course->id) }}" method="get">
        <div class="col-lg-8 detail-lessons">
            <input type="text" class="form-control search-lessons" name="key_detail_course" placeholder="Search"
                aria-label="Search" @if (isset($keyword)) value={{ $keyword }} @endif>
        </div>
        <div class="col-lg-2 btn-search-lessons">
            <input type="submit" value="Search" class="btn-search">
        </div>
    </form>
    <div class="col-lg-4 pr-0 align-self-center btn-join-container">
        <form method="post" action="{{ route('courses.users.store', $course) }}">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            @if($course->is_joined)
                <button type="submit" class="btn-join-course" id="btnJoinedCourse"">Joined</button>
            @else
                <button type="submit" class="btn-join-course" id="btnJoinCourse">Join in the course</button>
            @endif
        </form>
    </div>
</div>
<div class="row m-0 show-lessons-container">
    <div class="col-lg-12">
        @foreach ($lessons as $key => $lesson)
            <div class="row">
                <div class="col-lg-8 pr-0">
                    <p class="txt-title-lessons">{{ $key + 1 }}. {{ $lesson->title }}</p>
                </div>
                <div class="col-lg-4 pl-0 btn-more-lessons">
                    @if ($course->is_joined)
                    @if ($totalDocuments->count() > 0)
                    @if ($totalDocuments[0]->lesson_id == $lesson->id)
                        @if ($learnedPart == 0)
                            <a href="{{ route('lessons.show', $lesson->id)}}">Learn</a>
                        @elseif ($learnedPart > 0 && $learnedPart < 1) 
                            <i class="fas fa-check-circle icon-check-learning"></i>
                            <a href="{{ route('lessons.show', $lesson->id)}}">Learning</a>
                        @elseif ($learnedPart == 1)
                            <i class="fas fa-check-circle icon-check-learned"></i>
                            <a href="{{ route('lessons.show', $lesson->id)}}">Learned</a>
                        @endif
                    @else
                                <a href="{{ route('lessons.show', $lesson->id) }}">Learn</a>
                            @endif
                        @else
                            <a href="{{ route('lessons.show', $lesson->id) }}" onsubmit="return false">Learn</a>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="pagination-container">
    {{ $lessons->appends($_GET)->links('pagination::bootstrap-4') }}
</div>

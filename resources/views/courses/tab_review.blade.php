<div class="container">
    <div>
        <p class="reviews">Reviews</p>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-lg-3 col-xs-12 col-md-6 text-center">
                        <h1 class="rating-num">
                            {{ $course->total_rate }}</h1>
                        <div class="rating-review">
                            <span class="star">{{ getRate($course->total_rate) }}</span>
                        </div>
                        <div class="rating-total">
                            <span>{{ $course->number_review }} Ratings</span>
                        </div>
                    </div>
                    <div class="col-lg-9 col-xs-12 col-md-6 star-five">
                        <div class="row rating-desc">
                            @foreach ($course->numberRate as $starRating)
                                <div class="col-lg-1 col-xs-3 col-md-3 text-right">
                                    <span class="glyphicon glyphicon-star">{{ $starRating->rate }}</span>
                                </div>
                                <div class="col-lg-10 col-xs-8 col-md-9">
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{ $course->number_review > 0 ? ($starRating->total / $course->number_review) * 100 : 0 }}%">
                                            <span class="sr-only"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-xs-3 col-md-3 text-left">
                                    <span class="glyphicon glyphicon-star">{{ $starRating->total }}</span>
                                </div>
                            @endforeach
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="m-3">
    <div class="review-content">
        <ul id="commentArea">
            @foreach ($course->reviews as $review)
                <div>
                    <div class="user-info">
                        <div class="avatar" style="url('{{ $review->users->avatar }}')">
                        </div>
                        <p class="text-centers">
                            {{ $review->users->name }}<span class="star" style="margin-left: 1rem">
                                <div class="star-user-rating ">
                                    @for ($i = 0; $i < $review->rate; $i++)
                                        <i class="fas fa-star checked"></i>
                                    @endfor
                                    @for ($i = 0; $i < 5 - $review->rate; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                            </span></p>
                        <p class="text-centers">{{ $review->created_at }}</p>
                    </div>
                    <p class="text-centers">{{ $review->content }}</p>
                </div>
                <div class="row btn-reply-comment m-0 justify-content-end align-items-center">
                    <a href="#" class="btn-reply" data-id="{{ $review->id }}" onclick="return false">Reply</a>
                </div>
                <div data-id="{{ $review->id }}"
                    class="row reply-comment-container justify-content-end align-items-center">
                    @foreach ($replies as $reply)
                        @if ($reply->feeback_id == $review->id)
                            <div class="col-lg-11">
                                <hr>
                                <div class="comment-header row reply-comment-main align-items-center">
                                    <div class="name-user-cmt text-centers">
                                        <p>{{ $reply->name }}</p>
                                    </div>
                                    <div class="time-user-cmt text-centers">
                                        <p>{{ $reply->created_at }}</p>
                                    </div>
                                </div>
                                <div class="row pl-0 comment-body reply-comment-body">
                                    <p>{{ $reply->content }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row justify-content-end align-items-center">
                    <div class="col-lg-11 input-reply-container">
                        <form class="form-reply-comment {{ $review->id }}">
                            @csrf
                            <br>
                            <textarea name="review" data-id="{{ $review->id }}"
                                class="form-control input-reply-comment" rows="4"></textarea>
                            <br>
                            <input type="hidden" data-id="{{ $review->id }}" value="{{ $review->id }}"
                                class="review-id-reply">
                            <input type="hidden" data-id="{{ $review->id }}"
                                value="{{ Auth::check() ? Auth::user()->id : '' }}" class="user-id-reply">
                            <input class="btn-sent-reply" data-id="{{ $review->id }}" type="submit" value="Send">
                        </form>
                    </div>
                </div>
                <hr>
            @endforeach
        </ul>
    </div>
    <div class="add-review my-3 text-centers">Leave a review</div>
    <form method="POST" action="{{ route('review.course') }}" id="reviewForm">
        @csrf
        <div class="message-add-review my-3 text-centers">Message</div>
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <textarea name="content" id="content" cols="30" rows="5" class="form-control mb-3"></textarea>
        @if ($errors->has('content'))
            <error class="text-danger">
                {{ $errors->first('content') }}
            </error>
        @endif
        <div class="vote-star-review d-flex align-items-center">
            <div class="add-review text-centers"> Vote: </div>
            <div class="rating pt-2 px-3">
                <input class="rate" type="radio" name="rate" id="star-five"
                    value="{{ config('constants.variable.rate.five_star') }}"><label for="star-five">5
                    stars</label>
                <input class="rate" type="radio" name="rate" id="star-four"
                    value="{{ config('constants.variable.rate.four_star') }}"><label for="star-four">4
                    stars</label>
                <input class="rate" type="radio" name="rate" id="star-three"
                    value="{{ config('constants.variable.rate.three_star') }}"><label for="star-three">3
                    stars</label>
                <input class="rate" type="radio" name="rate" id="star-two"
                    value="{{ config('constants.variable.rate.two_star') }}"><label for="star-two">2
                    stars</label>
                <input class="rate" type="radio" name="rate" id="star-one"
                    value="{{ config('constants.variable.rate.one_star') }}"><label for="star-one">1
                    stars</label>
            </div>
            <div class="text-centers">star</div>
        </div>
        @if ($errors->has('rate'))
            <error class="text-danger">
                {{ $errors->first('rate') }}
            </error>
        @endif
        <div class="d-flex justify-content-end mt-n3">
            @if (Auth::check())
                <button type="submit" class="btn btn-reply">Send</button>
            @else
                <a data-target="#myModal" data-toggle="modal" id="btn-send" class="btn btn-reply">Send</a>
                <input type="text" hidden name="id" value="">
            @endif
        </div>
    </form>
</div>

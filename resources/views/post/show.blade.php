@extends('layouts.main')
@section('content')
<!--================Blog Area =================-->
<section class="blog_area single-post-area all_post section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ asset('storage/' . $currentPost->main_image) }}" alt="">
                    </div>
                    <div class="blog_details">
                        <h2>{{ $currentPost->title }}</h2>
                        <div>
                            {{ $currentPost->content }}
                        </div>
                        <p class="float-left mt-4"><a href="{{ url()->previous() }}">Back</a></p>
                        <p class="float-right mt-4">{{ $currentPost->date }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @include('includes.post.sidebar')
            </div>
        </div>
    </div>
</section>
@endsection

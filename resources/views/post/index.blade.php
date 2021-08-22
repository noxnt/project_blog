@extends('layouts.main')
@section('content')
    <!-- feature_post start-->
    <section class="all_post section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_post post_1">
                                    <div class="single_post_img">
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="">
                                    </div>
                                    <div class="single_post_text text-center">
                                        <a href="{{ route('post.index', ['category' => $post->category->id]) }}">
                                            <h5>{{ $post->category->title }}</h5>
                                        </a>
                                        <a href="{{ route('post.show', $post->id) }}">
                                            <h2>{{ $post->title }}</h2>
                                        </a>
                                        <p>{{ $post->date }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="page_pageniation">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('includes.post.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!-- feature_post end-->
@endsection

@extends('layouts.main')
@section('content')
    <!-- feature_post start-->
    <section class="all_post section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single_post post_1 feature_post">
                                <div class="single_post_img">
                                    <img src="{{ asset('assets/img/post/post_12.png') }}" alt="">
                                </div>
                                <div class="single_post_text text-center">
                                    <a href="category.html"><h5> Fashion / Life style</h5></a>
                                    <a href="single-blog.html"><h2>All said replenish years void kind say void </h2></a>
                                    <p>Posted on April 15, 2019</p>
                                </div>
                            </div>
                        </div>
                        @foreach($posts as $post)
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_post post_1">
                                    <div class="single_post_img">
                                        <img src="{{ asset('assets/img/post/post_18.png') }}" alt="">
                                    </div>
                                    <div class="single_post_text text-center">
                                        <a href="to_cat"><h5>{{ $post->category }}</h5></a>
                                        <a href="single-blog.html"><h2>{{ $post->title }}</h2></a>
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
                    <div class="sidebar_widget">
                        <div class="single_sidebar_wiget search_form_widget">
                            <form action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="btn_1">search</div>
                                </div>
                            </form>
                        </div>
                        <div class="single_sidebar_wiget">
                            <div class="sidebar_tittle">
                                <h3>Categories</h3>
                            </div>
                            <div class="single_catagory_item category">
                                <ul class="list-unstyled">
                                    @foreach($posts->take(10) as $post)
                                        <li><a href="category.html">{{ $post->category }}</a> <span>(15)</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="single_sidebar_wiget">
                            <div class="sidebar_tittle">
                                <h3>Popular Feeds</h3>
                            </div>
                            <div class="single_catagory_post post_2 ">
                                <div class="category_post_img">
                                    <img src="{{ asset('assets/img/sidebar/sidebar_1.png') }}" alt="">
                                </div>
                                <div class="post_text_1 pr_30">
                                    <a href="single-blog.html">
                                        <h3>Subdue lesser beast winged
                                            bearing meat tree one</h3>
                                    </a>
                                    <p><span> By Michal</span> / March 30</p>
                                </div>
                            </div>
                            <div class="single_catagory_post post_2 ">
                                <div class="category_post_img">
                                    <img src="{{ asset('assets/img/sidebar/sidebar_2.png') }}" alt="">
                                </div>
                                <div class="post_text_1 pr_30">

                                    <a href="single-blog.html">
                                        <h3>Subdue lesser beast winged
                                            bearing meat tree one</h3>
                                    </a>
                                    <p><span> By Michal</span> / March 30</p>
                                </div>
                            </div>
                            <div class="single_catagory_post post_2">
                                <div class="category_post_img">
                                    <img src="{{ asset('assets/img/sidebar/sidebar_3.png') }}" alt="">
                                </div>
                                <div class="post_text_1 pr_30">
                                    <a href="single-blog.html">
                                        <h3>Subdue lesser beast winged
                                            bearing meat tree one</h3>
                                    </a>
                                    <p><span> By Michal</span> / March 30</p>
                                </div>
                            </div>
                        </div>

                        <div class="single_sidebar_wiget">
                            <div class="sidebar_tittle">
                                <h3>Share this post</h3>
                            </div>
                            <div class="social_share_icon tags">
                                <ul class="list-unstyled">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature_post end-->

    <!-- social_connect_part part start-->
    @include('includes.post.social_images')
    <!-- social_connect_part part start-->
@endsection

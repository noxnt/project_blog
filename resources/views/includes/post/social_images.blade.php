
<!-- social_connect_part part start-->
<section class="social_connect_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="social_connect">
                    @foreach($posts->take(6) as $post)
                    <div class="single-social_connect">
                        <div class="social_connect_img">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" class="" alt="blog">
                            <div class="social_connect_overlay">
                                <a href="{{ route('post.show', $post->id) }}"><span class="ti-instagram"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- social_connect_part part end-->

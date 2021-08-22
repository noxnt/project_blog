<div class="sidebar_widget">
    <div class="single_sidebar_wiget search_form_widget">
        <form action="{{ route('post.index') }}" method="GET">
            <div class="form-group">
                <input type="text" class="form-control" placeholder='Search by title'
                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search by title'"
                       name="title">
                <input class="btn_1 w-100" type="submit" value="Search" style="border: 0">
            </div>
        </form>
    </div>
    <div class="single_sidebar_wiget">
        <div class="sidebar_tittle">
            <h3>Categories</h3>
        </div>
        <div class="single_catagory_item category">
            <ul class="list-unstyled">
                @foreach($categories->take(10) as $category)
                    <li>
                        <a href="{{ route('post.index', ['category' => $category->id]) }}">
                            {{ $category->title }}
                        </a>
                        <span>{{ $category->posts->count() }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="single_sidebar_wiget">
        <div class="sidebar_tittle">
            <h3>Popular posts</h3>
        </div>
        @foreach(App\Models\Post::all()->take(3) as $post)
            <div class="single_catagory_post post_2 ">
                <div class="category_post_img">
                    <img src="{{ asset('storage/' . $post->preview_image) }}">
                </div>
                <div class="post_text_1 pr_30">
                    <a href="{{ route('post.show', $post->id) }}">
                        <h3>{{ $post->title }}</h3>
                    </a>
                    <p>{{ $post->date }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="single_sidebar_wiget">
        <div class="sidebar_tittle">
            <h3>Tags</h3>
        </div>
        <div>
            <ul class="tags-list">
                @foreach($tags as $tag)
                    <li class="tags-item">
                        <a href="{{ route('post.index', ['tag' => $tag->id]) }}">{{ $tag->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

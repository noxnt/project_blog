@extends('layouts.admin')
@section('content')
    <div class="row mb-3">
        <div class="w-75">
            <div class="d-flex">
                <h2 class="m-0">Posts ({{ $posts->total() }}):</h2>
                <form class="input-group w-75 search-form" action="{{ route('admin.post.index') }}" method="GET">
                    <input type="search" class="form-control rounded search-input" placeholder="Search by title" name="title">
                </form>
            </div>
        </div>
        <a href="{{ route('admin.post.create') }}" type="button" class="btn btn-light w-25">Create new post</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Preview</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Status</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>
                    <a class="badge badge-secondary btn-badge"
                        href="{{ route('admin.post.edit', $post->id) }}">{{ $post->title }}
                    </a>
                </td>
                <td>{{ $post->preview }}</td>
                <td>
                    <a class="badge badge-secondary btn-badge" href="{{ route('admin.category.show', $post->category->id) }}">
                        {{ $post->category->title }}
                    </a>
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle btn-badge" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $post->tags->count() }} tags
                        </button>
                        <div class="dropdown-menu">
                            @foreach($post->tags as $tag)
                                <a class="dropdown-item" href="{{ route('admin.tag.show', $tag->id) }}">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </td>
                <td>
                    <div class="btn-group">
                        <span class="badge badge-{{ $post['is_published'] == 1 ? 'success' : 'warning' }} btn-badge">
                            <i class="fa fa-eye{{ $post['is_published'] == 1 ? '' : '-slash' }}" aria-hidden="true"></i>
                        </span>
                    </div>
                </td>
                <td scope="col">
                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger btn-badge" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row mb-3">
        <div class="admin-pagination w-75">
            {{ $posts->withQueryString()->links() }}
        </div>
        <a href="{{ route('admin.post.create') }}" type="button" class="btn btn-light w-25 mb-3">Create new post</a>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <h1>{{ $tag->title }}</h1>
    <h2 class="mt-5 mb-3">Update tag</h2>
    <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="row">
            <div class="form-group col-md-5">
                <input class="form-control @error('title') is-invalid @enderror"
                    placeholder="Title" name="title" value="{{ $tag->title }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-md-1">
                <input type="submit" class="btn btn-dark btn-light-border" value="Update" style="width: 100%">
            </div>
        </div>
    </form>

    <h2>{{ $posts->total() }} posts with this tag:</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Preview</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr class="link-detail">
                <th scope="row">{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['category_title'] }}</td>
                <td>{{ $post['preview'] }}</td>
                <td>
                    <span class="badge badge-{{ $post['is_published'] == 1 ? 'success' : 'warning' }} btn-badge">
                        <i class="fa fa-eye{{ $post['is_published'] == 1 ? '' : '-slash' }}" aria-hidden="true"></i>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="admin-pagination mb-2">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection

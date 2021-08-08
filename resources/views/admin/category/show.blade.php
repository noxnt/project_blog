@extends('layouts.admin')
@section('content')
    <h1>{{ $category->title }}</h1>
    <p>{{ $category->description }}</p>
    <h2 class="mt-5 mb-3">Update category</h2>
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="row">
            <div class="form-group col-md-5">
                <input class="form-control" placeholder="Title" name="title" value="{{ $category->title }}">
            </div>

            <div class="form-group col-md-1">
                <input type="submit" class="btn btn-dark btn-light-border" value="Update" style="width: 100%">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <textarea class="form-control form-textarea" rows="4"
                placeholder="Description" name="description">{{ $category->description }}</textarea>
            </div>
        </div>
    </form>

    <h2>{{ $posts->total() }} posts in the category:</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Preview</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr class="link-detail">
                <th scope="row">{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['preview'] }}</td>
                <td>
                    <span class="badge badge-{{ $post['is_published'] == 1 ? 'success' : 'secondary' }} btn-badge">
                        {{ $post['is_published'] == 1 ? 'Published' : 'Unpublished' }}
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

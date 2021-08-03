@extends('layouts.admin')
@section('content')
    <h1>Posts in the category "{{ $category->title }}":</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Preview</th>
            <th scope="col">Status</th>
            <th scope="col">Detail</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['preview'] }}</td>
                <td>
                    <span class="badge badge-{{ $post['is_published'] == 1 ? 'success' : 'secondary' }} btn-badge">
                        {{ $post['is_published'] == 1 ? 'Published' : 'Unpublished' }}
                    </span>
                </td>
                <td scope="col"><a class="badge badge-primary btn-badge" href="">To post</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

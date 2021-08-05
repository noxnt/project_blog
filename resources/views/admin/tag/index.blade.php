@extends('layouts.admin')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Posts</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr class="link-detail">
                <th scope="row">{{ $tag['id'] }}</th>
                <td>{{ $tag['title'] }}</td>
                <td scope="col"><a class="badge badge-info btn-badge"
                    href="{{ route('admin.tag.show', $tag['id']) }}">{{ $tag['count'] }}</a>
                </td>
                <td scope="col">
                    <form action="{{ route('admin.tag.destroy', $tag['id']) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger btn-badge" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2 class="mt-5 mb-3">Create tag</h2>
    <form action="{{ route('admin.tag.store') }}" method="POST">
    @csrf
        <div class="row">
            <div class="form-group col-md-5">
                <input class="form-control" placeholder="Title" name="title">
            </div>

            <div class="form-group col-md-1">
                <input type="submit" class="btn btn-dark btn-light-border" value="Create" style="width: 100%">
            </div>
        </div>
    </form>
@endsection

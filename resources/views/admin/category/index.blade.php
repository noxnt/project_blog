@extends('layouts.admin')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Posts</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr class="link-detail">
                <th scope="row">{{ $category['id'] }}</th>
                <td>{{ $category['title'] }}</td>
                <td>{{ $category['description'] }}</td>
                <td scope="col"><a class="badge badge-info btn-badge"
                    href="{{ route('admin.category.show', $category['id']) }}">{{ $category['count'] }}</a>
                </td>
                <td scope="col">
                    <form action="{{ route('admin.category.destroy', $category['id']) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger btn-badge" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="admin-pagination mb-2">
        {{ $categories->withQueryString()->links() }}
    </div>

    <h2 class="mt-5 mb-3">Create category</h2>
    <form action="{{ route('admin.category.store') }}" method="POST">
    @csrf
        <div class="row">
            <div class="form-group col-md-5">
                <input class="form-control" placeholder="Title" name="title">
            </div>

            <div class="form-group col-md-1">
                <input type="submit" class="btn btn-dark btn-light-border" value="Create" style="width: 100%">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <textarea class="form-control form-textarea" rows="4" placeholder="Description" name="description"></textarea>
            </div>
        </div>
    </form>
@endsection

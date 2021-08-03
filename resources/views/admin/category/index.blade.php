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
            <tr>
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
    <h2 class="mt-5 mb-3">Create category</h2>
    <div class="row">
        <div class="form-group col-md-5">
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Title">
        </div>

        <div class="form-group col-md-1">
            <button type="button" class="btn btn-dark btn-light-border" style="width: 100%">Create</button>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <textarea class="form-control form-textarea" id="exampleFormControlTextarea1" rows="4" placeholder="Description"></textarea>
        </div>
    </div>




    {{--    <h2>Create</h2>--}}
    {{--    <form action="{{ route('admin.category.store') }}" method="POST">--}}
    {{--        @csrf--}}
    {{--        <input name="title">--}}
    {{--        <input name="description">--}}
    {{--        <input class="btn btn-info btn-badge" type="submit" value="Create">--}}
    {{--    </form>--}}
    {{--    </div>--}}
@endsection

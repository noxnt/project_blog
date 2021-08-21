@extends('layouts.admin')
@section('content')
    <div class="d-flex w-100">
        <h2 class="m-0">Tags ({{ $tags->total() }}):</h2>
        <form class="input-group w-50 search-form" action="{{ route('admin.tag.index') }}" method="GET">
            <input type="search" class="form-control rounded search-input" placeholder="Search by title" name="title">
        </form>
    </div>

    <div class="col-md-12 mt-3 pl-0">
        <button type="button" class="btn btn-light w-25" data-toggle="collapse"
                data-target="#formCollapse" aria-expanded="false">Create new tag
        </button>

        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="collapse multi-collapse" id="formCollapse">
                    <form action="{{ route('admin.tag.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-5">
                                <input class="form-control @error('title') is-invalid @enderror"
                                       placeholder="Title" name="title">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-1">
                                <input type="submit" class="btn btn-dark btn-light-border" value="Create" style="width: 100%">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

    <div class="admin-pagination mb-2">
        {{ $tags->withQueryString()->links() }}
    </div>
@endsection

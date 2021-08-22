@extends('layouts.admin')
@section('content')
    <div class="row mb-3">
        <div class="d-flex w-100">
            <h2 class="m-0">Categories ({{ $categories->total() }}):</h2>
            <form class="input-group w-50 search-form" action="{{ route('admin.category.index') }}" method="GET">
                <input type="search" class="form-control rounded search-input" placeholder="Search by title" name="title">
            </form>
        </div>
    </div>

    <div class="col-md-12 mt-3 pl-0">
        <button type="button" class="btn btn-light w-25" data-toggle="collapse"
                data-target="#formCollapse" aria-expanded="false">Create new category
        </button>

        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="collapse multi-collapse" id="formCollapse">
                    <form action="{{ route('admin.category.store') }}" method="POST">
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
                                <input type="submit" class="btn btn-dark btn-light-border w-100" value="Create">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <textarea class="form-control form-textarea @error('description') is-invalid @enderror"
                                      rows="4" placeholder="Description" name="description"></textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
            <th scope="col">Description</th>
            <th scope="col">Posts</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr class="link-detail">
                <th scope="row">{{ $category->id }}</th>
                <td>
                    <a class="badge badge-secondary btn-badge"
                       href="{{ route('admin.category.show', $category->id) }}">{{ $category->title }}
                    </a>
                </td>
                <td>{{ $category->description }}</td>
                <td scope="col"><a class="badge badge-info btn-badge"
                    href="{{ route('admin.post.index', ['category' => $category->id]) }}">{{ $category->posts->count() }}</a>
                </td>
                <td scope="col">
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
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
@endsection

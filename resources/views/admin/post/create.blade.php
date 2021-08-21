@extends('layouts.admin')
@section('content')
    <h1>Post creation</h1>

    <div class="row mb-3">
        <div class="col-md-3">
            <a href="{{ URL::previous() != URL::current() ? URL::previous() : route('admin.post.index') }}"
               type="button" class="btn btn-light btn-light-border">
                <i class="fas fa-chevron-circle-left"></i> Go back
            </a>
        </div>
    </div>

    <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-8">
                        <input class="form-control @error('title') is-invalid @enderror"
                            placeholder="Title" name="title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                            <label class="btn btn-secondary active status-toggle-publish">
                                <input type="radio" name="is_published" value="1" autocomplete="off" checked>Publish
                            </label>
                            <label class="btn btn-secondary status-toggle-unpublish">
                                <input type="radio" name="is_published" value="0" autocomplete="off">Unpublish
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control @error('preview') is-invalid @enderror"
                        placeholder="Preview" name="preview" style="min-height: 7vh">
                    </textarea>
                    @error('preview')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea class="form-control @error('content') is-invalid @enderror"
                        placeholder="Content" rows="10" name="content" id="summernote">
                    </textarea>
                    @error('content')
                        <p class="text-danger" style="margin-top: -1rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group d-flex">
                    <div class="input-group w-50 mr-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('preview_image') is-invalid @enderror"
                                id="preview-image" name="preview_image">
                            <label for="preview-image" class="custom-file-label">Choose preview image</label>
                        </div>
                        @error('preview_image')
                            <div class="w-100"><p class="text-danger">{{ $message }}</p></div>
                        @enderror
                    </div>

                    <div class="input-group w-50">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('main_image') is-invalid @enderror"
                                id="main-image" name="main_image">
                            <label for="main-image" class="custom-file-label">Choose main image</label>
                        </div>
                        @error('main_image')
                            <div class="w-100"><p class="text-danger">{{ $message }}</p></div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend category-prepend-label">
                                <label class="input-group-text" for="category-select">Category</label>
                            </div>
                            <select class="custom-select" id="category-select" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group border border-secondary rounded p-2" style="background-color: #343a40;">
                            <span style="color: rgba(255,255,255,0.5);">Tags:</span>
                            @foreach($tags as $tag)
                                <input class="tags-checkbox" id="tag{{ $tag->id }}" type="checkbox" value="{{ $tag->id }}" name="tags[]">
                                <label class="tags-label" for="tag{{ $tag->id }}">
                                    <span class="badge badge-secondary btn-badge tag-badge">{{ $tag->title }}</span>
                                </label>
                            @endforeach

                            <hr style="background-color: rgba(255,255,255, 0.5) !important">
                            <span style="color: rgba(255,255,255,0.5);">Add tags:</span>

                            <div class="form-group mb-0">
                                <input class="form-control @error('newTags') is-invalid @enderror"
                                    placeholder="Tag name, tag, tag" name="newTags">
                                @error('newTags')
                                    <div class="w-100"><p class="text-danger">{{ $message }}</p></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="submit" class="btn btn-light btn-light-border w-100" value="Create post">
                </div>
            </div>
        </div>
    </form>
@endsection

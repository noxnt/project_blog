@extends('layouts.admin')
@section('content')
    <h1>Edit post</h1>

    <div class="row mb-3">
        <div class="col-md-3">
            <a href="{{ URL::previous() != URL::current() ? URL::previous() : route('admin.post.index') }}"
                type="button" class="btn btn-light btn-light-border">
                <i class="fas fa-chevron-circle-left"></i> Go back
            </a>
        </div>
    </div>

    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-8">
                        <input class="form-control" placeholder="Title" name="title" value="{{ $post->title }}">
                    </div>

                    <div class="form-group col-md-4">
                        <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                            <label class="btn btn-secondary active status-toggle-publish">
                                <input type="radio" name="is_published" value="1" autocomplete="off"
                                {{ $post->is_published == 1 ? ' checked' : '' }}>Publish
                            </label>
                            <label class="btn btn-secondary status-toggle-unpublish">
                                <input type="radio" name="is_published" value="0" autocomplete="off"
                                {{ $post->is_published == 0 ? ' checked' : '' }}>Unpublish
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="Preview" name="preview" style="min-height: 7vh">{{ $post->preview }}</textarea>
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="Content" rows="10" name="content" id="summernote">{{ $post->content }}</textarea>
                </div>

                <div class="form-group d-flex">
                    <div class="input-group w-50 mr-3">
                        <div class="image-block mb-2 w-100">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" class="w-100" alt="{{ $post->title }}">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="preview-image" name="preview_image"
                                value="{{ asset('storage/' . $post->preview_image) }}">
                            <label for="preview-image" class="custom-file-label">
                                {{ $post->preview_image ?? 'Choose preview image' }}
                            </label>
                        </div>
                    </div>

                    <div class="input-group w-50">
                        <div class="image-block mb-2 w-100">
                            <img src="{{ asset('storage/' . $post->main_image) }}" class="w-100" alt="{{ $post->title }}">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="main-image" name="main_image"
                                value="{{ asset('storage/' . $post->main_image) }}">
                            <label for="main-image" class="custom-file-label">
                                {{ $post->main_image ?? 'Choose main image' }}
                            </label>
                        </div>
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
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? ' selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
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
                                <input class="tags-checkbox" id="tag{{ $tag->id }}" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                @foreach($post->tags as $postTag)
                                    {{ $tag->id == $postTag->id ? ' checked' : '' }}
                                @endforeach
                                ><label class="tags-label" for="tag{{ $tag->id }}"><span class="badge badge-secondary btn-badge tag-badge">{{ $tag->title }}</span></label>
                            @endforeach

                            <hr style="background-color: rgba(255,255,255, 0.5) !important">
                            <span style="color: rgba(255,255,255,0.5);">Add tags:</span>

                            <div class="form-group mb-0">
                                <input class="form-control" placeholder="Tag name, tag, tag" name="newTags">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group mb-0">
                    <input type="submit" class="btn btn-light btn-light-border w-100" value="Update post">
                </div>
            </div>
            </div>
        </div>
    </form>

    <div class="col-md-3">
        <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
        @csrf
        @method('delete')
            <div class="form-group">
                <input type="submit" class="btn btn-danger btn-light-border w-100 float-right" value="Delete post">
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h1 class="mb-4 fw-bold" style="color: #6366f1;">Edit Article</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header" style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: white;">
            <h5 class="mb-0">Update Article Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-bold">Article Title</label>
                    <input type="text" name="title" class="form-control form-control-lg"
                           value="{{ old('title', $post->title) }}">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Article Content</label>
                    <textarea name="body" rows="6" class="form-control">{{ old('body', $post->body) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Featured Image</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png">
                    <small class="form-text text-muted">Accepted formats: JPG, PNG</small>

                    @if ($post->image_path)
                        <div class="mt-3">
                            <label class="form-label">Current Image:</label>
                            <div>
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Current article image" 
                                     style="max-width: 250px; border-radius: 8px; border: 2px solid #e0e0e0;">
                            </div>
                        </div>
                    @endif
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary-custom px-4">
                        <strong>Save Changes</strong>
                    </button>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

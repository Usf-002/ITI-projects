@extends('layouts.app')

@section('content')
    <h1 class="mb-4 fw-bold" style="color: #6366f1;">Create New Article</h1>

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
            <h5 class="mb-0">Article Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-bold">Article Title</label>
                    <input type="text" name="title" class="form-control form-control-lg" 
                           placeholder="Enter a catchy title for your article..." 
                           value="{{ old('title') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Article Content</label>
                    <textarea name="body" rows="6" class="form-control" 
                              placeholder="Write your article content here...">{{ old('body') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Featured Image</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png">
                    <small class="form-text text-muted">Accepted formats: JPG, PNG</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary-custom px-4">
                        <strong>Publish Article</strong>
                    </button>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

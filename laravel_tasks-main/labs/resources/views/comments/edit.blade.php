@extends('layouts.app')

@section('content')
    <h1 class="mb-4 fw-bold" style="color: #6366f1;">Edit Comment</h1>

    <div class="alert alert-info mb-4">
        <strong>Article:</strong> {{ $post->title }}
    </div>

    <div class="card">
        <div class="card-header" style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: white;">
            <h5 class="mb-0">Update Your Comment</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-bold">Your Comment</label>
                    <textarea name="body" rows="4" class="form-control" 
                              placeholder="Edit your comment...">{{ old('body', $comment->body) }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary-custom">
                        <strong>Save Changes</strong>
                    </button>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

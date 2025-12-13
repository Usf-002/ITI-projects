@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header" style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: white;">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0 fw-bold">{{ $post->title }}</h3>
                <small>
                    Published: {{ $post->created_at ? $post->created_at->format('M d, Y • H:i') : '' }}
                </small>
            </div>
        </div>
        @if ($post->image_path)
            <div class="text-center p-3" style="background-color: #f8f9fa;">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Article featured image" 
                     style="max-width: 100%; max-height: 400px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            </div>
        @endif
        <div class="card-body">
            <div style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                {{ $post->body }}
            </div>
        </div>
    </div>

    <div class="mb-4">
        <h4 class="fw-bold mb-3" style="color: #6366f1;">
            Reader Comments 
            <span class="badge bg-secondary">{{ $post->comments->count() }}</span>
        </h4>

        @forelse ($post->comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <p class="mb-2" style="font-size: 1.05rem;">{{ $comment->body }}</p>
                            <small class="text-muted">
                                <i class="bi bi-clock"></i> {{ $comment->created_at?->diffForHumans() }}
                            </small>
                        </div>
                        <div class="btn-group ms-3">
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('comments.destroy', $comment->id) }}"
                                  method="POST"
                                  style="display:inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                <strong>No comments yet.</strong> Be the first to share your thoughts!
            </div>
        @endforelse
    </div>

    <div class="card mb-4">
        <div class="card-header" style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: white;">
            <h5 class="mb-0">Leave a Comment</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="mb-3">
                    <textarea name="body" rows="4" class="form-control" 
                              placeholder="Share your thoughts about this article...">{{ old('body') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary-custom">
                    <strong>Post Comment</strong>
                </button>
            </form>
        </div>
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
        ← Back to All Articles
    </a>
@endsection

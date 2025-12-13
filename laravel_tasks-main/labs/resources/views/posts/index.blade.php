@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 fw-bold" style="color: #6366f1;">All Articles</h1>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('posts.index') }}" method="GET" class="row g-3">
                <div class="col-md-5">
                    <input
                        type="text"
                        name="q"
                        class="form-control"
                        placeholder="Search articles by title or content..."
                        value="{{ request('q') }}"
                    >
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary-custom w-100">
                        Search
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary w-100">
                        Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: white;">
                    <tr>
                        <th>#</th>
                        <th>Preview</th>
                        <th>Article Title</th>
                        <th>Content Preview</th>
                        <th>Published</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="fw-bold">{{ $post->id }}</td>
                            <td>
                                @if($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Article thumbnail" style="max-width: 80px; border-radius: 8px;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td><strong>{{ $post->title }}</strong></td>
                            <td>{{ Str::limit($post->body, 50) }}</td>
                            <td>
                                {{ $post->created_at ? $post->created_at->format('M d, Y') : '' }}
                                <br>
                                <small class="text-muted">{{ $post->created_at ? $post->created_at->format('H:i') : '' }}</small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}"
                                          method="POST"
                                          style="display:inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{ $posts->links() }}
    </div>
@endsection

@include('layouts.header')
@include('layouts.sidebar')
<link rel="stylesheet" href="{{ asset('css/news.blade.css') }}">

<div class="edit-news-container">
    <h1>Edit news</h1>
    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Add your news edit form fields here -->
        <div class="form-group">
            <label for="title">news Title:</label>
            <input type="text" name="title" id="title" value="{{ $news->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">news Description:</label>
            <textarea name="description" id="description" required>{{ $news->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="thumbnail">Current Thumbnail:</label>
            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="Current Thumbnail" style="max-height: 200px;">
        </div>
        <div class="form-group">
            <label for="new_thumbnail">New Thumbnail (optional):</label>
            <input type="file" name="new_thumbnail" id="new_thumbnail">
        </div>
        <button type="submit">Save Changes</button>
    </form>
    <form action="{{ route('news.destroy', $news->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button">Delete news <i class="fas fa-trash-alt"></i></button>
    </form>
</div>

@include('layouts.footer')

@include('layouts.header')
@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS - News Details</title>
    <link rel="stylesheet" href="{{ asset('css/news-details.blade.css') }}"> <!-- Add the new CSS file -->
</head>
<body>
    <div class="news-details-container">
        <div class="news-details">
            @if(isset($news))
                <h1 class="news-title">{{ $news->title }}</h1>
                <div class="news-description">
                    {!! str_replace('src="storage/img_description/', 'src="' . asset('storage/img_description/') . '/', $news->description) !!}
                </div>
                <!-- Add other news details here -->
            @else
                <p>No news found.</p>
            @endif
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>

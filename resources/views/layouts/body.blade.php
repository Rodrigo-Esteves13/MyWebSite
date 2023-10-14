<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('css/body.blade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/news.blade.css') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
</head>
<body>
<body>
<div class="body-container">
    <div class="news-container">
        @if(isset($mostRecentNews))
        <div class="news-item">
            <a href="{{ route('news.show', ['id' => $mostRecentNews->id]) }}">
                <div class="thumbnail">
                    <img src="{{ asset('storage/' . $mostRecentNews->thumbnail) }}" alt="{{ $mostRecentNews->title }}">
                </div>
                <div class="news-details">
                    <h3 class="news-title">{{ $mostRecentNews->title }}</h3><br>
                </div>
            </a>
        </div>
        @else
        @endif
    </div>
    </div>
</body>
</html>
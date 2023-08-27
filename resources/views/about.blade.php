@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.footer')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>REMS</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/about.blade.css') }}">
    </head>
    <body>
    <main>
        <div class="profile">
            <img src="profileRodrigo.jpg" alt="Profile Picture">
            <h2>Rodrigo Esteves</h2>
            <p>17-year-old tech enthusiast</p>
        </div>
        <div class="details">
            <h3>Education</h3>
            <p>Studying at Escola Profissional Bento de Jesus Caraça</p>
            <h3>Experience</h3>
            <p>Worked as a web developer intern at Natixis in Porto</p>
            <p>Specialized in supporting applications and scripting</p>
            <h3>Languages</h3>
            <p>Favorite: PHP, Python, JS</p>
            <p>Also familiar with: C++, C#, PowerShell, HTML, CSS</p>
        </div>
    </main>
    </body>
</html>
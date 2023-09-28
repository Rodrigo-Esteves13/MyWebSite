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
        <div id="about-section" class="section">
            <!-- About Us content here -->
            <div class="profile">
                <img src="img/profileRodrigo.jpg" alt="Profile Picture">
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
        </div>
        <div id="other-section" class="section">
        <div class="profile">
                <img src="profileJoao.jpg" alt="Profile Picture">
                <h2>João Pereira</h2>
                <p>17-year-old tech enthusiast</p>
            </div>
            <div class="details">
                <h3>Education</h3>
                <p>Studying at Escola Profissional Bento de Jesus Caraça</p>
                <h3>Experience</h3>
                <p>Worked as a application support intern at Natixis in Porto</p>
                <p>Specialized in supporting applications and scripting</p>
                <h3>Languages</h3>
                <p>Favorite: PHP, Python, JS</p>
                <p>Also familiar with: C++, C#, PowerShell, HTML, CSS</p>
            </div>
        </div>
        <div id="others-section" class="section">
        <div class="profile">
                <img src="profileDaniel.jpg" alt="Profile Picture">
                <h2>Daniel Mendes</h2>
                <p>17-year-old tech enthusiast</p>
            </div>
            <div class="details">
                <h3>Education</h3>
                <p>Studying at Escola Profissional Bento de Jesus Caraça</p>
                <h3>Experience</h3>
                <p>Worked at Bos in Porto</p>
                <p>Specialized in ?</p>
                <h3>Languages</h3>
                <p>Favorite: </p>
                <p>Also familiar with: </p>
            </div>
        </div>
        <!-- Navigation arrows -->
        <button id="prev-section" class="nav-arrow">&#9664;</button>
        <button id="next-section" class="nav-arrow">&#9654;</button>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('.section');
            let currentSectionIndex = 0;

            function showSection(index) {
                sections.forEach((section, i) => {
                    section.style.display = i === index ? 'block' : 'none';
                });
            }

            showSection(currentSectionIndex);

            document.getElementById('prev-section').addEventListener('click', function () {
                currentSectionIndex = (currentSectionIndex - 1 + sections.length) % sections.length;
                showSection(currentSectionIndex);
            });

            document.getElementById('next-section').addEventListener('click', function () {
                currentSectionIndex = (currentSectionIndex + 1) % sections.length;
                showSection(currentSectionIndex);
            });
        });
    </script>
</body>
</html>

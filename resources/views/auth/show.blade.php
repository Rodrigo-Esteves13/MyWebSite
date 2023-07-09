@include('layouts.header')
@include('layouts.body')
@include('layouts.footer')
    <div class="container">
        <h1>User Profile</h1>
        
        <div>
            <h2>{{ $profileData->name }}</h2>
            <p>{{ $profileData->email }}</p>
            <!-- Display other profile data as needed -->
        </div>
    </div>

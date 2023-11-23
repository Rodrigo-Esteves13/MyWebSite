<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS</title>
    <link rel="stylesheet" href="{{ asset('css/email.blade.css') }}"> <!-- Link to your external CSS file -->
</head>
<body>
    @include('layouts.header')

    @include('layouts.sidebar')

    <div class="email-container">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                                <!-- Set the width of the label to 100% -->
                                <label for="email" class="mailLabel">Email Address</label>

                                <div class="mailInput">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <!-- Adjust the padding of the button -->
                                    <button type="submit" class="resetSubmit">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                        </form>
                    </div>
                </div>
            </div>

    @include('layouts.footer')
</body>
</html>

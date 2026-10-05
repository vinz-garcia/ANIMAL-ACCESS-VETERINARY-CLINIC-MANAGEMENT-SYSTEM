@extends('layouts.app')

@section('content')

<div class="login-page">

    <div class="login-left" style="background-image: url('{{ asset('images/vet-login.jpg') }}');">

        <div class="login-overlay"></div>

        <<div class="login-brand">

    <div class="login-logo">
        <img
            src="{{ asset('images/animal-access-logo.jpg') }}"
            alt="Animal Access Veterinary Clinic Logo"
        >
    </div>

    <div>
        <strong>Animal Access Veterinary Clinic</strong>
    </div>

</div>
        <div class="login-quote">
            <h2>
                "Caring for your pets<br>
                with compassion and expertise."
            </h2>

            <p>
                Sapang Putol, San Ildefonso, Bulacan
            </p>
        </div>

    </div>


    <div class="login-right">

        <div class="login-form-container">

            <h1>Welcome back</h1>

            <p class="login-subtitle">
                Sign in to the clinic management system.
            </p>

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="login-field">

                    <label for="email">
                        USERNAME
                    </label>

                    <input
                        id="email"
                        type="text"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="e.g. dr.reyes"
                        required
                        autocomplete="email"
                        autofocus
                    >

                    @error('email')
                        <small class="login-error-message">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="login-field">

                    <label for="password">
                        PASSWORD
                    </label>

                    <div class="password-wrapper">

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            class="show-password"
                            id="showPassword"
                        >
                            Show
                        </button>

                    </div>

                    @error('password')
                        <small class="login-error-message">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="login-remember">

                    <label>
                        <input
                            type="checkbox"
                            name="remember"
                            {{ old('remember') ? 'checked' : '' }}
                        >

                        Remember me
                    </label>

                </div>


                <button
                    type="submit"
                    class="login-button"
                >
                    Sign In
                </button>

            </form>


        

        </div>

    </div>

</div>

@endsection
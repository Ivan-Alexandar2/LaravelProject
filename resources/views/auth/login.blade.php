<style>
        /* Черен фон */
        .bg-dark {
            background-color: #1a1a1a;
        }

        /* Бял текст */
        .text-white {
            color: white;
        }

        /* Оранжев фон */
        .bg-orange {
            background-color: #FF6B35;
        }

        /* Оранжев текст */
        .text-orange {
            color: #FF6B35;
        }

        /* Оранжев бутон */
        .btn-orange {
            background-color: #FF6B35;
            border-color: #FF6B35;
            color: white;
        }

        .btn-orange:hover {
            background-color: #e65a2b;
            border-color: #e65a2b;
        }

        /* Допълнителни стилове за форми */
        .form-control {
            background-color: #1a1a1a;
            color: white;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            background-color: #1a1a1a;
            color: white;
            border-color: #FF6B35;
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
        }

        .invalid-feedback {
            color: #dc3545;
        }

        .is-invalid {
            border-color: #dc3545;
        }
</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white"> <!-- Черен фон за картата -->
                <div class="card-header bg-orange text-white"> <!-- Оранжев фон за хедъра -->
                    <h3 class="mb-0">{{ __('Login') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Имейл -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-orange">{{ __('Email Address') }}</label> <!-- Оранжев текст -->
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control bg-dark text-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Парола -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-orange">{{ __('Password') }}</label> <!-- Оранжев текст -->
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control bg-dark text-white @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Запомни ме -->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-orange" for="remember"> <!-- Оранжев текст -->
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Бутон за вход -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-orange text-white"> <!-- Оранжев бутон -->
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-orange" href="{{ route('password.request') }}"> <!-- Оранжев текст -->
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

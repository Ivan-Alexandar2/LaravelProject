<!DOCTYPE html>
<html>
    <head>       
    
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

/* Допълнителни стилове за семантични тагове */
main, section, article, header {
    display: block;
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.col-md-8 {
    flex: 0 0 66.666667%;
    max-width: 66.666667%;
}

.col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
}

.col-md-4 {
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
}

.offset-md-4 {
    margin-left: 33.333333%;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #1a1a1a;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #FF6B35;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.card-body {
    flex: 1 1 auto;
    padding: 1.25rem;
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: white;
    background-color: #1a1a1a;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
    color: white;
    background-color: #1a1a1a;
    border-color: #FF6B35;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
}

.invalid-feedback {
    display: none;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 80%;
    color: #dc3545;
}

.is-invalid {
    border-color: #dc3545;
}

.is-invalid ~ .invalid-feedback {
    display: block;
}

</style>
</head>


@extends('layouts.app')

@section('content')
<main class="container">
    <section class="row justify-content-center">
        <article class="col-md-8">
            <section class="card bg-dark text-white">
                <header class="card-header bg-orange text-white">
                    <h1 class="mb-0">{{ __('Register') }}</h1>
                </header>

                <section class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Име -->
                        <section class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-orange">{{ __('Name') }}</label>
                            <section class="col-md-6">
                                <input id="name" type="text" class="form-control bg-dark text-white @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </section>
                        </section>

                        <!-- Имейл -->
                        <section class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-orange">{{ __('Email Address') }}</label>
                            <section class="col-md-6">
                                <input id="email" type="email" class="form-control bg-dark text-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </section>
                        </section>

                        <!-- Парола -->
                        <section class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-orange">{{ __('Password') }}</label>
                            <section class="col-md-6">
                                <input id="password" type="password" class="form-control bg-dark text-white @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </section>
                        </section>

                        <!-- Потвърждение на паролата -->
                        <section class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-orange">{{ __('Confirm Password') }}</label>
                            <section class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control bg-dark text-white" name="password_confirmation" required autocomplete="new-password">
                            </section>
                        </section>

                        <!-- Бутон за регистрация -->
                        <section class="row mb-0">
                            <section class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-orange text-white">
                                    {{ __('Register') }}
                                </button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </article>
    </section>
</main>
@endsection
</html>
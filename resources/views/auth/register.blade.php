@extends('layouts.app')
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
</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white"> <!-- Променен фон на картата -->
                <div class="card-header bg-orange text-white"> <!-- Оранжев фон за хедъра -->
                    <h3 class="mb-0">{{ __('Register') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Име -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-orange">{{ __('Name') }}</label> <!-- Оранжев текст -->
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control bg-dark text-white @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Имейл -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-orange">{{ __('Email Address') }}</label> <!-- Оранжев текст -->
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control bg-dark text-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                <input id="password" type="password" class="form-control bg-dark text-white @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Потвърждение на паролата -->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-orange">{{ __('Confirm Password') }}</label> <!-- Оранжев текст -->
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control bg-dark text-white" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Бутон за регистрация -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-orange text-white"> <!-- Оранжев бутон -->
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
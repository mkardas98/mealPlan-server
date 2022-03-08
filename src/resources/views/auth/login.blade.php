@extends('layouts.app')

@section('content')

    <section class="loginPage">
        <div class="loginPage__content">
            <form class="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <img src="{{asset('image/logo.svg')}}" class="loginPage__logo" alt="Meal Plan">

                <span class="loginForm__title"><i class="mdi mdi-account" aria-hidden="true"></i> ADMIN PANEL</span>
                <div class="loginForm__input --mb-2">
                    <label for="login">Login</label>
                    <input id="login" onchange="this.classList.remove('is-invalid')" type="text"
                           class="form-control @error('username') is-invalid @enderror"
                           name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>
                </div>

                <div class="loginForm__input --mb-2">
                    <label for="password">Hasło</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password">
                </div>

                <div class="loginForm__remember --mb-4">
                    <div class="pretty p-icon p-round p-smooth">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <div class="state p-success">
                            <i class="icon mdi mdi-check"></i>
                            <label>Zapamiętaj mnie</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="buttonPrimary -green --mb-1">
                   <span>Zaloguj</span>
                </button>

                @if (Route::has('password.request'))
                    <a class="loginForm__forgot" href="{{ route('password.request') }}">
                        Nie pamiętam hasła
                    </a>
                @endif
            </form>
        </div>
    </section>

    @push('scripts.body.bottom')
        <script>
            loginPage()
        </script>
    @endpush
    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Login') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    <form method="POST" action="{{ route('login') }}">--}}
    {{--                        @csrf--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('username Address') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>--}}

    {{--                                @error('username')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

    {{--                                @error('password')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <div class="col-md-6 offset-md-4">--}}
    {{--                                <div class="form-check">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

    {{--                                    <label class="form-check-label" for="remember">--}}
    {{--                                        {{ __('Remember Me') }}--}}
    {{--                                    </label>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-0">--}}
    {{--                            <div class="col-md-8 offset-md-4">--}}
    {{--                                <button type="submit" class="btn btn-primary">--}}
    {{--                                    {{ __('Login') }}--}}
    {{--                                </button>--}}

    {{--                                @if (Route::has('password.request'))--}}
    {{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--                                        {{ __('Forgot Your Password?') }}--}}
    {{--                                    </a>--}}
    {{--                                @endif--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
@endsection

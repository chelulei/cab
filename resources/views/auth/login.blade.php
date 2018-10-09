@extends('layouts.main')
@section('content')
    <div class="container">
        <div id="form">
            <div class="logo">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <div class="form-item">
                    <p class="formLabel">{{ __('E-Mail Address') }}</p>
                    <input id="email" type="email" class="form-style{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>
                <div class="form-item">
                    <p class="formLabel">{{ __('Password') }}</p>
                    <input id="password" type="password" class="form-style{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                    <p><a href="{{ route('password.request') }}" ><small>  {{ __('Forgot Your Password?') }}</small></a></p>
                </div>
                <div class="form-item">
                    <p class="pull-left"><a href="{{ route('register') }}"><small>{{ __('Register') }}</small></a></p>
                    <input type="submit" class="login pull-right" value="Log In">
                    <div class="clear-fix"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container -->

@endsection
@push('styles')
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('/js/login.js') }}"></script>
@endpush
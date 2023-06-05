@extends('layouts.default')

@section('content')
    <div class="splash-container">
        <div class="card" style="margin-top: 30px;">
            <div class="card-header text-center"><a href="/"><img class="logo-img" src="{{ asset('images/logo.png') }}" alt="logo"></a></div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="form-group">
                        <input id="email" type="text" class="form-control form-control-user @if ($errors->has('email')) border-danger @endif" aria-describedby="emailHelp" placeholder="Username" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        
                        @if ($errors->has('email'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control form-control-user @if ($errors->has('password')) border-danger @endif" placeholder="Password" name="password" autocomplete="current-password">
                        
                        @if ($errors->has('password'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    <a href="/register" class="btn btn-default btn-lg btn-block">Register</a>
                </form>
            </div>
            <!-- <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('register') }}" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('password.request') }}" class="footer-link">Forgot Password</a>
                </div>
            </div> -->
        </div>
    </div>
@endsection
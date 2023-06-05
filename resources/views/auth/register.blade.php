@extends('layouts.default')

@section('content')
    <form class="container" method="POST" action="{{ route('register') }}">
    @csrf
        <div class="card">
            <div class="card-header text-center">
                <h1 class="h4 text-gray-900 mb-2">Registration Form</h3>
                <p class="splash-description">Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" required="" placeholder="Complete Name" autocomplete="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="text" name="email" required="" placeholder="Email Address" autocomplete="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" type="password" required autocomplete="new-password" placeholder="Password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control form-control-lg" id="password-confirm" type="password" required autocomplete="new-password" placeholder="Confirm Password" name="password_confirmation">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input id="terms" class="custom-control-input" type="checkbox"><span class="custom-control-label">I agree with the <a href="#">terms and conditions</a></span>
                    </label>
                </div>
                <div class="form-group pt-2">
                    <button id="register" class="btn btn-block btn-primary" type="submit">Register</button>
                </div>
            </div>
            <div class="card-footer bg-white text-center">
                <p>Already member? <a href="{{ route('login') }}" class="text-primary">Login Here</a></p>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $(function() {
          var chk = $('#terms');
          var btn = $('#register');

          chk.on('change', function() {
            btn.prop("disabled", !this.checked);//true: disabled, false: enabled
          }).trigger('change'); //page load trigger event
        });
    </script>
@endsection

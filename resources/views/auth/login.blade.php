@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col m6 offset-m3">
            <div class="card-panel">
                <h5 class="right-align">{{ __('Login') }}</h5>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <script>
                                $(document).ready(function(){   
                                M.toast({html: '{{ $errors->first('email')  }}' })
                                });
                                </script>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <script>
                                $(document).ready(function(){   
                                M.toast({html: '{{ $errors->first('password')  }}' })
                                });
                                </script>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                        <p>
                                          <label>
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span>{{ __('Remember Me') }}</span>
                                          </label>
                                        </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col m6">
                                <a class="" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> 
                            </div>
                            <div class="col m6 right-align">
                                <button type="submit" class="btn blue-grey darken-4">
                                    {{ __('Login') }}
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

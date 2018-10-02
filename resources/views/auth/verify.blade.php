@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col m8 s12 offset-m2">
            <div class="card-panel">
                <h5 class="card-header">Verify Your Email Address</h5>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            A fresh verification link has been sent to your email address.
                        </div>
                    @endif

                    <p>Before proceeding, please check your email for a verification link.
                    If you did not receive the email.</p>
                <div class="row center-align">
                    <a class="btn black" href="{{ route('verification.resend') }}">Resend verification email</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

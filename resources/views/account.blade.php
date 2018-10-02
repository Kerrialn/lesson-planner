@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col m8 offset-m2">
      <div class="card-panel">
        <h5>Account information</h5>
        <form method="POST" action="{{ route('update.user') }}">
            @csrf  

          <div class="input-field col m12">
            <i class="material-icons prefix">account_circle</i>
            <input placeholder="Full Name" id="name" name="name" type="text" class="validate" value="{{ $user->name }}">
            <label for="name">Full Name</label>
          </div>

          <div class="input-field col m12">
            @if($user->email_verified_at)
            <i class="material-icons prefix tooltipped" data-position="top" data-tooltip="Verified">verified_user</i>
            @else
            <i class="material-icons prefix tooltipped" data-position="top" data-tooltip="Not Verified">error_outline</i>
            @endif
            <input placeholder="Email address" id="email" name="email" type="text" class="validate" value="{{ $user->email }}">
            <label for="email">Email address</label>
          </div>

          <div class="center-align">
            <button type="submit" class="btn black">save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@extends('layouts.guest')

@section('title', 'Login')

@section('content')
  <main class="login-box">
    <h1 class="login-logo">
      <a href="{{ route('admin.dashboard') }}"><b>Admin</b>LTE</a>
    </h1>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        {{-- Layout only: no auth functionality --}}
        <form action="#" method="get">
          <label class="visually-hidden" for="loginEmail">Email</label>
          <div class="input-group mb-3">
            <input id="loginEmail" type="email" class="form-control" placeholder="Email" />
            <div class="input-group-text">
              <span class="bi bi-envelope"></span>
            </div>
          </div>

          <label class="visually-hidden" for="loginPassword">Password</label>
          <div class="input-group mb-3">
            <input id="loginPassword" type="password" class="form-control" placeholder="Password" />
            <div class="input-group-text">
              <span class="bi bi-lock-fill"></span>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Remember Me</label>
              </div>
            </div>
            <div class="col-4">
              <div class="d-grid gap-2">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Sign In</a>
              </div>
            </div>
          </div>
        </form>

        <p class="mb-1 mt-3">
          <a href="#">I forgot my password</a>
        </p>
      </div>
    </div>
  </main>
@endsection

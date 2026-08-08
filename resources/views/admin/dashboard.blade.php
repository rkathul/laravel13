@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
  <div class="row g-3">
    <div class="col-md-3 col-6">
      <div class="small-box text-bg-primary">
        <div class="inner">
          <h3>{{ $usersCount }}</h3>
          <p>Users</p>
        </div>
        <i class="bi bi-people small-box-icon" aria-hidden="true"></i>
        <a href="{{ route('admin.users.index') }}" class="small-box-footer link-light">
          More info <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
@endsection

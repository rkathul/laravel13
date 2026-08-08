@extends('layouts.app')

@section('title', 'Create User')
@section('page-title', 'Create User')



@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create User</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.users.create') }}" id="createUserForm" method="post" novalidate>
            @csrf
            <div class="row">
              <div class="col-6 mb-3">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
              </div>
              <div class="col-6 mb-3">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="password_confirmation">Password Confirmation</label>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 mt-3">
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Create User</button>
                  <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>

      $('#createUserForm').validate({

        rules: {
          name: { required: true },
          email: { required: true, email: true },
          password: { required: true },
          password_confirmation: { required: true, equalTo: '#password' },
        },
        messages: {
          name: { required: 'Name is required' },
          email: { required: 'Email is required', email: 'Email is not valid' },
          password: { required: 'Password is required' },
          password_confirmation: { required: 'Password confirmation is required', equalTo: 'Password confirmation does not match' },
        },
      });

  </script>

@endpush

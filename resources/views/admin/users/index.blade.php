@extends('layouts.app')

@section('title', 'Users')
@section('page-title', 'Users')

@push('styles')
  <link
    rel="stylesheet"
    href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.min.css"
  />
@endpush

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header ">
          <div class="d-flex justify-content-between align-items-center">
          <h3 class="card-title">All Users</h3>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
          </div>
        </div>
        <div class="card-body">
          {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover w-100']) !!}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {!! $dataTable->scripts(attributes: ['type' => 'module']) !!}
  <script>
    document.addEventListener('click', function (event) {
      const button = event.target.closest('.btn-delete-user');
      if (!button) {
        return;
      }

      const url = button.dataset.url;
      const name = button.dataset.name;

      Swal.fire({
        title: 'Are you sure?',
        text: `Delete user "${name}"? This action cannot be undone.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
      }).then((result) => {
        if (!result.isConfirmed) {
          return;
        }

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = url;
        form.innerHTML =
          '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
          '<input type="hidden" name="_method" value="DELETE">';
        document.body.appendChild(form);
        form.submit();
      });
    });
  </script>
@endpush

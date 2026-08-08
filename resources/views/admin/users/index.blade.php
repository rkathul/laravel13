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
        <div class="card-header">
          <h3 class="card-title">All Users</h3>
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
  {!! $dataTable->scripts(attributes: ['type' => 'module']) !!}
@endpush

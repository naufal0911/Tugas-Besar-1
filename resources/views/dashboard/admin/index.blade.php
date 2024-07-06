@extends('dashboard.layouts.main')
@section('container')
@if (session()->has('login_berhasil'))
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            {{ session('login_berhasil') }}
        </div>
      </div>
    </div>
  </div>
@endif
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <h1>{{ auth()->user()->group->nama_group }}</h1>
                        sad
        @endsection

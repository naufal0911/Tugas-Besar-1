@extends('dashboard.layouts.main')
@section('container')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
          @if (session()->has('daftar_sukses'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('daftar_sukses') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
            <div class="container-fluid px-4">
                <h1 class="mt-4">Detail Pkl</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
                    <div class="form-group">
                      <label for="nama_sekolah">Nama Sekolah</label>
                      <input class="form-control mb-3" type="text" placeholder="{{ $daftar->nama_sekolah }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="alamat_perusahaan">Alamat Sekolah</label>
                      <input class="form-control mb-3" type="text" placeholder="{{ $daftar->alamat_sekolah }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="email_sekolah">Email</label>
                      <input type="text" class="form-control mb-3" placeholder="{{ $daftar->email_sekolah }}" disabled>
                    </div>
                    @if ($daftar->jadwal_id != 0)
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Tanggal Mulai PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="{{ $start }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Tanggal Selesai PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="{{  $end}}" disabled>
                    </div>
                    
                    @if (  $daftar->tanggal >= $daftar->jadwal->tanggal_mulai_pkl & $daftar->tanggal <= $daftar->jadwal->tanggal_selesai_pkl )
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Status PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="Sedang Dilaksanakan" disabled>
                    </div>
                    @elseif ( $daftar->tanggal < $daftar->jadwal->tanggal_mulai_pkl )
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Status PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="Belum Dilaksanakan" disabled>
                    </div>
                    @elseif ( $daftar->tanggal > $daftar->jadwal->tanggal_selesai_pkl )
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Status PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="Selesai Dilaksanakan" disabled>
                    </div>
                    @endif
                    @endif

                    <div class="form-group">
                        <label for="dok_daftar_siswa" class="mb-2">Dokumen Pendukung</label>
                      </div>
                    <a class="btn btn-outline-primary mb-3" href="{{ asset('storage/' . $daftar->dok_daftar_siswa) }}" role="button">Download Dokumen Pendukung</a>
                    <br><a onclick="history.back(-1)" role="button" style="font-size: 30px"><i class="bi bi-skip-backward-circle"></i></a>
                    </main>
                    
@endsection
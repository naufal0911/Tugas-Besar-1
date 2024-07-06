@extends('dashboard.layouts.main')
@section('container')

        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Pembelian Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Seluruh Daftar Pembelian Produk</li>
                        </ol>
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        <div class="card mb-4">
                          <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Detail Penjualan Produk
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-striped" style="width:100%">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Tanggal</th>
                                  <th scope="col">Customer</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                            
                              <tbody>
                                <tr>
                                  @foreach ($tokoorders as $item)
                                  <td>{{ $no++ }}</td>
                                  <td>{{ \Carbon\Carbon::parse($item->dateshipped)->isoFormat('D MMMM Y'); }}</td>
                                  <td>{{ $item->customer }}</td>
                                  <td>
                                    <a href="{{ URL('/Dashboard/toko/daftarpenjualan/detail/'.$item->id )}}"><span class="badge bg-primary" ><i class="bi bi-eye"></i></span></a>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                             
                            </table>
                        </div>
                          </div>
                        </div>
                      </main>
        @endsection
